@extends('app')


@section('content')

<div class="row">

    <div class="players col-md-6">
        <h2>Available Players:</h2>
        @foreach($players as $player)
            <h4>{{ $player->number }} - {{ $player->name }}</h4>
        @endforeach
    </div>

    <div class="form col-md-6" style="margin-top: 20px;"> 
        <form method="POST" action='{{ url("/players") }}'>

            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Player Name:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="number">Player Number:</label>
                <input type="text" class="form-control" name="number" id="number">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr />

</div>
@stop
