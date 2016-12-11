@extends('app')


@section('content')

<div class="competitors">
    <h2>Current Competitors:</h2>
    @foreach($competitors as $competitor)
        <h4>{{ $competitor->name }}</h4>
    @endforeach
</div>

<hr />

<div class="form">
    <form method="POST" action='{{ url("/competitors") }}'>

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Competitor Name:</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@stop