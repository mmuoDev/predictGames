<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Prediction;
use App\Game;
use App\Sys_rating;
use App\PredictionCodes;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $free_predictions = DB::select(
            "select g.game as game, g.id as game_id, g.user_id as user_id, u.name as fullname, g.game_date as game_date,  sg.id as id, sg.code as status from games as g, users as u,sys_grades as sg 
             where 
              u.make_prediction_category = g.user_id and 
              g.user_id != $user_id  and 
              u.make_prediction_category = 1 and 
              u.user_rating = sg.id and 
              date(g.game_date) >= CURDATE()
              "
        );
        return view('home', compact("free_predictions"));
    }
}
