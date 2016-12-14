<!DOCTYPE html>
<html>
    <head>
        <title>Stars Calls</title>

         <link rel="shortcut icon" href="{{{ asset('assets/favicon.ico') }}}">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    </head>
    <body>
        <div class="container-fluid">
            <nav>
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="{{ url('/scores') }}">Home</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/competitors') }}">Competitors</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/players') }}">Players</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/picks') }}">Make Picks</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/leaderboard') }}">Leaderboard</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/history') }}">History</a></li>

                </ul>
            </nav>
        </div>
        <div class="container">

            @yield('content')

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/sweetalert.js"></script>
        @include('Alerts::show')

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
