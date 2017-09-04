<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\PredictionCodes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Game;
use App\Prediction;


class PredictionController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
        $method = $request->isMethod('post');
        if($method){
            //Process form
            $validator = Validator::make($request->all(), [
                'match' => 'required',
                'match_date' => 'required',
                'match_prediction' => 'required'
            ],
                ['match_prediction.required' => 'At least one prediction is needed']
            );
            if($validator->fails()){
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            //Insert into game table
            $game = Game::create([
                'user_id' => Auth::user()->id,
                'game' => $request->match,
                'game_date' => date("Y-m-d",strtotime($request->match_date))
            ]);
            if($game){
                //var_dump();exit;
                //Get the predictions for this game
                $game_id = $game->id;
                foreach ($request->match_prediction as $id => $value){
                    $predictions = Prediction::create(
                        [
                            'game_id' => $game_id,
                            'prediction_id' => $value
                        ]
                    );
                }
                if($predictions){
                    return back()
                        ->with('status', 'Prediction added');
                }
            }
        }else{
            //return view
            //fetch all prediction codes
            $items = DB::select("select * from prediction_codes");
            return view('predictions/create')
                    ->with('items', $items);
        }
    }
    public function view(Request $request)
    {
        $method = $request->isMethod('post');
        if ($method) {
            $game_id = $request->game_id;
            $user = $request->user_id;
            $user_id = Auth::user()->id;
            //Fetch predictions for this game
            $predictions = DB::select("select pc.definition as status, pc.code as code from predictions as p, prediction_codes as pc
                      where p.game_id = $game_id and 
                      p.prediction_id = pc.id      
        ");
            //Fetch game +user details
            $game_details = DB::select("select u.id as user_id, u.name as fullname, g.game as game, g.id as game_id from games as g, users as u 
                      where g.user_id = u.id and 
                      g.id = $game_id");
            //Fetch prediction codes
            $grades = DB::select("select * from sys_grades");
            //Check if user has already graded this prediction
            $count = DB::select("select * from graded_games where game_id = $game_id and user_id = $user_id");

            //Fetch last 5 ratings for this user
            $ratings = DB::select("select g.game as game, u.name as fullname, g.game_date as game_date, sg.code as rate from graded_games as gg, games as g, sys_grades as sg, users as u where
                  u.id = gg.user_id and 
                  g.id = gg.game_id and 
                  gg.grade_id = sg.id and
                  gg.predictor_id = $user and gg.game_id != $game_id order by gg.id DESC LIMIT 5");
            //var_dump($ratings);exit;
            return view('predictions/free_view')->with(['ratings' => $ratings, 'count' => $count, 'predictions' => $predictions, 'game_details' => $game_details, 'grades' => $grades]);
        }else{
            return redirect()->route('home');
        }
    }
}
