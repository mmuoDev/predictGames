@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($predictors as $predictor)
        <a href="{{url('predictors/'.$predictor->id)}}" class='col-sm-12' style="display: block;">
            <div class="col-sm-3">
		        <img class="img img-thumbnail" src="{{ asset('img/avatar-1.jpg') }}" />
	        </div>
	        <div class="col-sm-6">
	        	<h2>{{$predictor->name}}</h2>
	    	</div>
	    </a>
        @endforeach
        </div>
    </div>



@endsection