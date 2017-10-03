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
                                            <div class="" style="padding-top: 10px;">
                                                <a class="btn btn-primary btn-sm" role="button" data-toggle="collapse" href="#epl" aria-expanded="false" aria-controls="collapseExample">
                                                    EPL
                                                </a>
                                                <button class="btn btn-danger btn-sm" type="button" data-toggle="collapse" data-target="#la_liga" aria-expanded="false" aria-controls="collapseExample">
                                                    LA LIGA
                                                </button>
                                                <div class="collapse" id="epl" style="padding-top: 10px">
                                                    <div class="well">
                                                        <table class='table table-bordered' id='prediction'>
                                                            <thead>
                                                            <tr>
                                                                <th>Match</th>
                                                                <th>Match Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            @if(isset($epl_free_predictions))
                                                                <tbody>
                                                                    @foreach($epl_free_predictions as $epl_free_prediction)
                                                                        <?php
                                                                        $date = date("D, M j, Y", strtotime($epl_free_prediction->match_date));
                                                                        ?>
                                                                    <tr>
                                                                        <td>{{$epl_free_prediction->name}}</td>
                                                                        <td>{{$date}}</td>
                                                                        <td><a href="{{url('predictions/freemium/matches/view/'. $epl_free_prediction->id)}}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> View</a> </td>

                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="la_liga" style="padding-top: 10px">
                                                    <div class="well">
                                                        <table class='table table-bordered' id='predictions'>
                                                            <thead>
                                                            <tr>
                                                                <th>Match</th>
                                                                <th>Match Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            @if(isset($liga_free_predictions))
                                                                <tbody>
                                                                @foreach($liga_free_predictions as $liga_free_prediction)
                                                                    <?php
                                                                    $date = date("D, M j, Y", strtotime($liga_free_prediction->match_date));
                                                                    ?>
                                                                    <tr>
                                                                        <td>{{$liga_free_prediction->name}}</td>
                                                                        <td>{{$date}}</td>
                                                                        <td><a href="{{url('predictions/freemium/matches/view/'. $liga_free_prediction->id)}}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> View</a> </td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="create">

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
