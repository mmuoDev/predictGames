@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                @if(isset($users))
                    @foreach($users as $user)
                        <?php  $rating = $user->rating * 10; ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="well well-sm">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <h4> {{$user->fullname}}</h4>
                                            <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                                    </i></cite></small>
                                            <p>
                                                <i class="fa fa-star"></i> User rating: {{$rating}}%
                                                <br />
                                                <i class="fa fa-podcast"></i> Predictions: <br>
                                                @if(isset($predictions))
                                                    <ul>
                                                    @foreach($predictions as $prediction)
                                                        <li>
                                                        {{$prediction->codes}} <br>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                @endif
                                                <br />
                                                <i class="glyphicon glyphicon-gift"></i>
                                                <form action="{{url('predictions/rate')}}" method="post">
                                                    {{csrf_field()}}
                                                    Rate this user: <br>
                                                    <div id="slidecontainer">
                                                        <input type="hidden" name="game_id" value="{{$user->game_id}}">
                                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                                        <input type="range" min="1" max=10 value="" class="slider" name="rating" id="myRange">
                                                        <p>Value: <span id="demo"></span></p>
                                                    </div>

                                                    <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Submit">
                                                </form>
                                            </p>
                                            <!-- Split button -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>


    </div>
@endsection
@section('script')
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>

@endsection
