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
