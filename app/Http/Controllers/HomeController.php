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
        $epl_free_predictions = DB::select(
            "select a.match as name, a.match_date as match_date, a.id as id from games as g, matches as a, users as u,
            leagues as c
            WHERE 
            c.id = a.league_id and 
            g.match_id = a.id and u.id = g.user_id and 
            g.user_id != $user_id  and 
            u.make_prediction_category = 1 and 
            a.league_id = 1 and 
            date(a.match_date) >= CURDATE()
            GROUP BY a.id order by a.match_date ASC 
            "
        );

        $liga_free_predictions = DB::select(
            "select a.match as name, a.match_date as match_date, a.id as id from games as g, matches as a, users as u,
            leagues as c
            WHERE 
            c.id = a.league_id and 
            g.match_id = a.id and u.id = g.user_id and 
            g.user_id != $user_id  and 
            u.make_prediction_category = 1 and 
            a.league_id = 2 and 
            date(a.match_date) >= CURDATE()
            GROUP BY a.id order by a.match_date ASC 
            "
        );
        //var_dump($free_predictions);exit;
        return view('home', compact("epl_free_predictions", 'liga_free_predictions'));
    }
}
