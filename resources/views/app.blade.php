<!DOCTYPE html>
<html>
    <head>
        <title>Stars Calls</title>

         <link rel="shortcut icon" href="{{{ asset('assets/favicon.ico') }}}">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

         <link rel="stylesheet" href="{{{ asset('css/style.css') }}}">

        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    </head>
    <body>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="container-fluid">
            <nav>
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="{{ url('/scores') }}">Home</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/competitors') }}">Competitors</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/players') }}">Players</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/picks') }}">Make Picks</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/leaderboard') }}">Leaderboard</a></li>
                    <li role="presentation"><a class="nav-item" href="{{ url('/history') }}">History</a></li>
                    <li role="presentation" class="twitter_icon"><a class="nav-item"><i class="fa fa-inverse fa-twitter-square fa-2x" data-toggle="modal" data-target="#twitter_modal"></i></a></li>
                </ul>
            </nav>
        </div>
        <div class="container">

            @yield('content')

            <div class="modal right fade" id="twitter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel2">Twitter Feeds</h4>
                        </div>

                        <div class="modal-body">
                            <a class="twitter-timeline" href="https://twitter.com/StarsInsideEdge">Tweets by StarsInsideEdge</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>

                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- modal -->

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/sweetalert.js"></script>
        @include('Alerts::show')

        <script src="{{{ asset('js/main.js') }}}"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <script src="https://use.fontawesome.com/0701652f7e.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
