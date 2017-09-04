@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-bullhorn" aria-hidden="true"></i> Current Prediction <br><br>
                @foreach($game_details as $game_detail)

                <i class="fa fa-trophy" aria-hidden="true"></i> {{ucfirst($game_detail->game)}} <br><br>
                <i class="fa fa-tasks" aria-hidden="true"></i> Prediction<br>

                @foreach($predictions as $prediction)
                {{$prediction->status}}({{$prediction->code}})<br>
                @endforeach
                <br>

                Rate this user  <i class="fa fa-meh-o" aria-hidden="true"></i> <i class="fa fa-frown-o" aria-hidden="true"></i><br><br>
                @if(count($count) != 1)
                <form action="{{url('user/rating')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{$game_detail->user_id}}">
                    <input type="hidden" name="game_id" value="{{$game_detail->game_id}}">
                    @foreach($grades as $grade)
                        <input type="radio" name="grade" value="{{$grade->id}}" checked>{{ucfirst($grade->code)}} <br>
                    @endforeach
                    <button type="submit" class="btn btn-sm btn-danger" aria-label="Left Align">
                        <span class="fa fa-check fa-lg" aria-hidden="true"></span>
                        Rate
                    </button>
                </form>
                @else
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> You already rated this prediction!
                @endif
                @endforeach
            </div>
            <div class="col-md-6">
                Last 5 ratings for this user <br><br>
                @if(count($ratings) > 0)
                    @foreach($ratings as $rating)
                        <?php
                        $date = date("D, M j, Y", strtotime($rating->game_date));
                        ?>
                        <p>
                            <label>Match:</label> {{$rating->game}} ({{$date}}) <br>
                            <em>Rating by {{ucfirst($rating->fullname)}}</em> => {{ucfirst($rating->rate)}}
                        </p>
                        <br>
                    @endforeach
                @else
                    No ratings for this user.
                @endif
            </div>
        </div>


    </div>
@endsection
