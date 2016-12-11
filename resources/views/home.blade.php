@extends('app')


@section('content')

<div class="submission_form">
    <form method="POST" action='{{ url("/submissions") }}'>

      {!! csrf_field() !!}

      <div class="form-group">
        <label for="competitor">User:</label>
        <select id="competitor" class="form-control" name="competitor[]">
            @foreach($competitors as $competitor)
                <option>
                    {{ $competitor->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="pick-one">Pick One:</label>
        <select class="form-control" id="pick-one" name="pick_one">
            @foreach($players as $player)
                <option>
                  {{ $player->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="pick-two">Pick Two:</label>
        <select class="form-control" id="pick-two" name="pick_two">
            @foreach($players as $player)
                <option>
                   {{ $player->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="pick-three">Pick Three:</label>
        <select class="form-control" id="pick-three" name="pick_three">
            @foreach($players as $player)
                <option>
                    {{ $player->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="pick-wildcard">Wildcard Pick:</label>
        <select class="form-control" id="pick-wildcard" name="pick_wildcard">
            @foreach($players as $player)
                <option>
                    {{ $player->name }}
                </option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@stop
