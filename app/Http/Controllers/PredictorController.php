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


class PredictorController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $predictors = User::all();

        return view('predictors/index')->with('predictors', $predictors);

    }

    public function show($id){

        $predictor = User::find($id);

        return view('predictors/show')->with('predictor', $predictor);

    }

    public function subscribe(Request $request){


        $response = $this->query_api_transaction_verify($request->reference);

        if($response['status'] === true){
            $amount = floatval(($response['data']['amount']/100));
            $card = $response['data']['authorization']['card_type'];

            $subscription = Subscription::create(
                ['amount' => $amount,'card' => $card,'status' => $response['status'],'transaction_reference' => $request->reference,'user_id' => $request->user_id, 'subscriber_id' => Auth::user()->id]
            );

            if($subscription) {
                return redirect()->route('show-subscription', ['id' => $subscription->id]);
            }
            
        }else{
            Session::flash('flash_message', 'Sorry, something went wrong! Please contact the Administrator or Bank.');
        }


            

        

        // $predictor = User::find($id);

        // return view('predictors/show')->with('predictor', $predictor);

    }

    protected function query_api_transaction_verify($reference)
    {
            
           $result = array();
           //The parameter after verify/ is the transaction reference to be verified
           $url = 'https://api.paystack.co/transaction/verify/'.$reference;

           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt(
             $ch, CURLOPT_HTTPHEADER, [
               'Authorization: Bearer sk_test_47df907b6798049ba4fd92802ba053e305914953']
           );
           $request = curl_exec($ch);
           curl_close($ch);

           if ($request) {
             $result = json_decode($request, true);
             return $result;
           }else {
            return false;
           }

           
        }
        
    
}
