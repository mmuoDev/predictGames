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
                    @if(session('error'))
                        <div class="alert alert-danger col-md-3">
                            <ul style="list-style: none;">
                                <li>{{session('error')}}</li>
                            </ul>
                        </div>
                    @endif
            </div>
            <form role="form" action="{{url('predictions/create')}}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-6">
                    <div class=""><strong style="color:red;">All fields are required</strong></div><br>
                    <div class="form-group">
                        <label for="league">Select League</label>
                        <div class="input-group">
                            <select class="form-control league" name="league">
                                <option>--Please select--</option>
                                @foreach($leagues as $league)
                                    <option value="{{$league->id}}">{{$league->league}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="league">Select Match</label>
                        <div class="input-group">
                            <select class="form-control" name="match" id="match">
                            </select>
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
@section('script')
    <script>
        $('.league').on('change', function(e){
            //alert('hi');
            //console.log(e);
            var token = $("input[name='_token']").val();
            var league = e.target.value;
            //ajax
            $.ajax({
                url: "<?php echo route('fetch-match') ?>",
                method: 'POST',
                data: {league:league, _token:token},
                success: function(data) {
                    $('#match').empty();
                    $.each(data, function(index, subCatObj){
                        var mySQLDate = subCatObj.match_date;
                        var newDate = new Date(mySQLDate);
                        var myDate = newDate.toDateString();
                        $('#match').append('<option value="'+subCatObj.id+'">'+subCatObj.match+'['+myDate+']</option>')
                    });
                }
            });

        });

    </script>
@endsection
