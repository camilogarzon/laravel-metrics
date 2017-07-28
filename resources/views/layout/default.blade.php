<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Pilot</title>

        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        @yield('fonts')
                <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        @yield('styles')
        @yield('javascript_head')
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Metrics Tracking System
                </a>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/metrics') }}">Metrics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/data_points') }}">Data Points</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/data_point/table') }}">Table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/data_point/chart') }}">Chart</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
        </div>
        <script src="{{ asset('js/lib/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script type="text/javascript">
            window.rootUrl = "{{ URL::to('/')}}/";
            window.csrfToken = "{{ csrf_token() }}";
        </script>
        @yield('javascript')
    </body>
</html>
