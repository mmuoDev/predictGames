@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
		        <img class="img img-thumbnail" src="{{ asset('img/avatar-1.jpg') }}" />
	        </div>
	        <div class="col-sm-9">
	        	<h2>{{$predictor->name}}</h2>
	        	<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
	        	<form id="subscribe-form" role='form' action="{{url('predictors/subscribe')}}" method="post">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	  <script src="https://js.paystack.co/v1/inline.js"></script>
	        	  <h4>N4000/month</h4>
	        	  <button class="btn btn-info btn-lg" type="button" onclick="payWithPaystack()"> Subscribe </button>
	        	  <input type="hidden" name="reference" id="reference" value="" />
	        	  <input type="hidden" name="user_id" value="{{$predictor->id}}" />
	        	</form>
	    	</div>
	    	<div class="col-sm-12">
	        	<h2>Recent Predictions</h2>
	        	<hr/>
	        	<button class="btn btn-info btn-lg" type="button"> View All Predictions </button> 
	    	</div>
    	</div>
    </div>




<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_2babf474a1fa34f8deef8c247210032f5c693e22',
      email: "{{$predictor->email}}",
      amount: 10000,
      metadata: {
         custom_fields: [
            {
                display_name: "{{$predictor->name}}",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
      	document.getElementById('reference').value = response.reference;
      	document.getElementById('subscribe-form').submit();
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>


@endsection