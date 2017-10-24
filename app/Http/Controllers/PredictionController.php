<?php

namespace App\Http\Controllers;
use App\League;
use App\PredictionRating;
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
    public function rating(Request $request){
        $rating = $request->rating;
        $game_id = $request->game_id;
        $predictor_id = $request->user_id;
        $user_id = Auth::user()->id;

        //Insert into prediction-ratings table and update
        //rating columns on games and user for the predictor

        $rating = PredictionRating::create([
           'rating' => $rating,
            'game_id' => $game_id,
            'predictor_id' => $predictor_id,
            'user_id' => $user_id
        ]);

    }
    public function view_free_matches($id){
        $matches = DB::select("
        select m.match as match_id, g.id as game_id, u.user_rating as rating from  predictions as p, matches as m, games as g, users as u where
        u.id = g.user_id and  
        g.id = p.game_id and m.id = g.match_id  and g.match_id = '$id' 
        group by p.game_id
        ");

        return view('predictions.free_view', compact('matches'));
    }
    public function view_predictions(Request $request, $id){

        $predictions = DB::select("select c.definition as codes from games as g, predictions as p, prediction_codes as c
        where g.id = p.game_id and
        c.id = p.prediction_id and 
        g.id = '$id'");
        $users = DB::select("select u.id as id, g.id as game_id, u.name as fullname, u.user_rating as rating from games as g, users as u 
         where g.user_id = u.id and g.id = '$id'");
        return view('predictions.predictions', compact('predictions', 'users'));
    }
    public function fetch_match(Request $request){
        $league = $request->league;
        $matches = DB::select("select * from matches where league_id = '$league'");
        return response()->json($matches);
    }
    public function create(Request $request){
        $method = $request->isMethod('post');
        $leagues = League::all();
        if($method){
            //Confirm that this user has not made any predictions for this match
            $user_id = Auth::user()->id;
            $sql = DB::select("select * from games where match_id = '$request->match' and user_id  = '$user_id'");
            if(count($sql) == 0){
                //Process
                //var_dump($request->league);exit;
                $validator = Validator::make($request->all(), [
                    'match' => 'required',
                    'league' => 'required',
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
                    'league_id' => $request->league,
                    'match_id' => $request->match
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
                return back()->with('error', 'Prediction(s) already made for selected match');
            }
        }else{
            //return view
            //fetch all prediction codes
            $items = DB::select("select * from prediction_codes");
            return view('predictions.create', compact('items', 'leagues'));
                    //->with('items', $items);
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
