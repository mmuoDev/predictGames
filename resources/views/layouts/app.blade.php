<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="navbar-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/home')}}">PredictGames</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        {{--
                        <ul class="nav navbar-nav">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Predictions <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                        <a href="{{url('/predictions/create')}}" >Make Prediction</a>
                                    </li>
                                    <li><a href="{{url('/predictions/create')}}">Add New</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subscriptions <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Managers</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>

                        </ul>
                        --}}
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Predictions <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                        <a href="{{url('/predictions/create')}}" >Make Prediction</a>
                                    </li>
                                    <li><a href="{{url('/predictions/create')}}">Add New</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subscriptions <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Managers</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Change Password</a></li>
                                    <li><a href="#">My Profile</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    @yield('content')
</div>
</body>
<!-- JS files -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script> /
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    $( function() {
        $('#prediction').DataTable();
    } );
    $( function() {
        $('#predictions').DataTable();
    } );

</script>