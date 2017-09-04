<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Graded_game;
use DB;

class RatingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Handle rating of the user/prediction
    public function rate(Request $request){
        $method = $request->isMethod('post');
        $user_id = $request->user_id;
        $grade = $request->grade;
        if($method) {
            switch ($grade) {
                case 1:
                    DB::table('sys_ratings')
                        ->where('user_id', $user_id)
                        ->increment('poor');
                    break;
                case 2:
                    DB::table('sys_ratings')
                        ->where('user_id', $user_id)
                        ->increment('good');
                    break;
                case 3:
                    DB::table('sys_ratings')
                        ->where('user_id', $user_id)
                        ->increment('expert');
                    break;

            }
            //Insert into graded games table
            $user = Auth::user()->id;
            Graded_game::create([
                'game_id' => $request->game_id,
                'user_id' => $user,
                'predictor_id' => $user_id,
                'grade_id' => $grade
            ]);
            //Compute the rating of the user based on figures on sys_ratings table and update the users table
            $getRatings = DB::select("select * from sys_ratings where user_id = $user_id");
            //var_dump($getRatings);exit;
            foreach ($getRatings as $ratings){
                $poor = $ratings->poor;
                $good = $ratings->good;
                $expert = $ratings->expert;
                $data = array('poor' => $poor, 'good' => $good, 'expert' => $expert);
            }
            //fetch maxmimum value
            $maxs[0] = array_keys($data, max($data));
            $maxs = $maxs[0];
            foreach ($maxs as $value){
                $max_value = $value;
            }
            if ($max_value == 'expert'){
                //var_dump($status);exit;
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                            'user_rating' => 3
                    ]);
            }else if($max_value == 'good'){
                //var_dump($max_value);exit;
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                        'user_rating' => 2
                    ]);
            }else if($max_value == 'poor'){
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                        'user_rating' => 1
                    ]);
            }else{}
        }
        return redirect()->route('home');

    }
}
