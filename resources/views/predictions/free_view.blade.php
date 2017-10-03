@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">

                        <table class='table table-bordered' id='prediction'>
                            <thead>
                            <tr>
                                <th>Match</th>
                                <th>User's rating</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(isset($matches))
                                <tbody>
                                @foreach($matches as $match)
                                    <?php  $rating = $match->rating * 10; ?>
                                    <tr>
                                        <td>{{$match->match_id}}</td>
                                        <td>{{$rating}}%</td>
                                        <td>
                                            <a href="{{url('predictions/view/'.$match->game_id)}}"
                                               class="btn btn-danger btn-sm"><i class="fa fa-eye"></i> View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
            </div>
        </div>


    </div>
@endsection
