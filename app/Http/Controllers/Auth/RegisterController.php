<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\User;
use App\MakeFreePredict;
use App\ViewFreePredict;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Sys_rating;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        $countries = DB::select("select * from countries");
        return view("auth.register", compact("countries"));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'make_prediction_category' => 1,
            'user_rating' => 1,
            'password' => bcrypt($data['password']),
            'country' => $data['country']
        ]);

        /**
         * Once user is created, give user free counts on making predictions and viewing predictions
         */
        if($user){
            /**
            MakeFreePredict::create([
                'user_id' => $user->id,
                'count' => 2
            ]);

            ViewFreePredict::create([
                'user_id' => $user->id,
                'count' => 2
            ]);
             * **/
            Sys_rating::create([
                'user_id' => $user->id,
                'poor' => 1, //Default rating for a new user
                'good' => 0,
                'expert' => 0

            ]);

        }
        return $user;

    }


}
