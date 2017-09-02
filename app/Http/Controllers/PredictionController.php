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
}
