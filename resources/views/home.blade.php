@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="" id="loginModal">
                    <div class="modal-body">
                            <div class="well">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#login" data-toggle="tab">Free Predictions</a></li>
                                    <li><a href="#create" data-toggle="tab">Premium Predictions</a></li>
                                </ul>
                                    <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane active in" id="login">

                                        <table class='table table-bordered' id='predictions'>
                                            <thead>
                                            <tr>
                                                <th>Match</th>
                                                <th>Match Date</th>
                                                <th>Predictor (Level)</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            @if(isset($free_predictions))
                                                <tbody>
                                                    @foreach($free_predictions as $free_prediction)
                                                        <?php
                                                        $date = date("D, M j, Y", strtotime($free_prediction->game_date));
                                                        ?>
                                                    <tr>
                                                        <td>{{$free_prediction->game}}</td>
                                                        <td>{{$date}}</td>
                                                        <td>{{ucfirst($free_prediction->fullname)}}

                                                            @if($free_prediction->id == 1)
                                                                ({{ucfirst($free_prediction->status)}}) <i class="fa fa-frown-o" aria-hidden="true"></i>
                                                            @elseif($free_prediction->id == 2)
                                                                ({{ucfirst($free_prediction->status)}}) <i class="fa fa-meh-o" aria-hidden="true"></i>
                                                            @elseif($free_prediction->id == 3)
                                                                ({{ucfirst($free_prediction->status)}}) <i class="fa fa-smile-o" aria-hidden="true"></i>
                                                            @endif
                                                            </td>
                                                        <td>
                                                            <form action="{{url('predictions/freemium/view')}}" method="post">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="game_id" value="{{$free_prediction->game_id}}">
                                                                <input type="hidden" name="user_id" value="{{$free_prediction->user_id}}">
                                                                <button type="submit" class="btn btn-danger" aria-label="Left Align">
                                                                    View
                                                                    <span class="fa fa-eye fa-lg" aria-hidden="true"></span>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="create">
                                        <table class='table table-bordered' id='prediction'>
                                            <thead>
                                            <tr>
                                                <th>Match</th>
                                                <th>Match Date</th>
                                                <th>Predictor's Star</th>
                                                <th>See Prediction</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>


    </script>
@endsection
