<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use App\Prediction;
use App\Subscription;


class SubscriptionController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $subscriptions = Subscription::all();

        return view('subscriptions/index')->with('subscriptions', $subscriptions);

    }

    public function show($id){

        $subscription = Subscription::find($id);

        return view('subscriptions/show')->with('subscription', $subscription);

    }

    
}
