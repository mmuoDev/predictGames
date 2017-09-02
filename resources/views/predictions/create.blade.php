@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(isset($errors))
                    @if(count($errors) > 0)
                    <div class="alert alert-danger col-md-3">
                        <ul style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                @endif
                    @if(session('status'))
                        <div class="alert alert-success col-md-3">
                            <ul style="list-style: none;">
                                <li>{{session('status')}}</li>
                            </ul>
                        </div>
                    @endif
            </div>
            <form role="form" action="{{url('predictions/create')}}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-6">
                    <div class=""><strong style="color:red;">All fields are required</strong></div><br>
                    <div class="form-group">
                        <label for="match">Match</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="match" id="match" placeholder="Home vs Away" value="{{ old('match') }}" required>
                            <p class="help-block">E.g. Chelsea - Manchester United </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="match_date">Match Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="match_date" id="datepicker" value="{{ old('match_date') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="match_predictions">Your Predictions (<small>You can tick more than one</small>)</label>
                        <div class="input-group">
                                    @foreach($items as $item)
                                        <input type="checkbox" name="match_prediction[{{$item->id}}]" value="{{$item->id}}">{{$item->definition}}<br>
                                    @endforeach
                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn mybutton">
                </div>
            </form>

        </div>

    </div>
@endsection
