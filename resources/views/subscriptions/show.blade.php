@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
	        <div class="col-xs-8">
	        <h3>You Subscribed to {{$subscription->Predictor->name}} [JANAURY]</h3>
		        <p>PREDICTOR: {{$subscription->Predictor->name}}</p>
				<p>AMOUNT: NGN{{$subscription->amount}}</p>
				<P>PERIOD: 1 Month</P>
			</div>
		</div>
</div>


@endsection