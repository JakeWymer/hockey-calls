@extends('app')


@section('content')
<div class="row">
    <h1 class="text-center">Today's Picks</h1>
</div>

<div class="row">
  <div class="col-xs-6">
    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#track_goal_modal">Track Goal</button>
  </div>
  <div class="col-xs-5">
    <form class="text-right" action='game/{{$game->id}}' method='POST'>

        {!! csrf_field() !!}

           <button type="submit" class="btn btn-danger">Close Game</button>
      </form>
  </div>
</div>

<div class="row">
   <div class="col-md-12">
      <table class = "table table-striped">
         <thead>
            <tr>
               <th>User</th>
               <th>Pick One</th>
               <th>Pick Two</th>
               <th>Pick Three</th>
               <th>Wildcard</th>
               <th>Points</th>
            </tr>
         </thead>
         
         <tbody>
        @if($submissions)
      	 @foreach($submissions as $submission)

            <tr class="pick">
                <td>{{ $submission->name }}</td>
                <td><div><img class="img-responsive" src="{{ $submission->pick_one->image_path }}"></img><h5>{{ $submission->pick_one->name }}</h5></div></td>
                <td><div><img class="img-responsive" src="{{ $submission->pick_two->image_path }}"></img><h5>{{ $submission->pick_two->name }}</h5></div></td>
                <td><div><img class="img-responsive" src="{{ $submission->pick_three->image_path }}"></img><h5>{{ $submission->pick_three->name }}</h5></div></td>
                <td><div><img class="img-responsive" src="{{ $submission->pick_wildcard->image_path }}"></img><h5>{{ $submission->pick_wildcard->name }}</h5></div></td>
                <td>{{ $submission->points }}</td>
            </tr>

      	 @endforeach
        @else
          <tr class="pick">
              <td>No Submissions Today!</td>
          </tr>
        @endif
         </tbody>
         
      </table>
   </div>
</div>

<div class="row">
    <div class="col-md-9">
      <h2 class="text-center">Goals Scored Today</h2>
      <table class = "table table-striped">
         <thead>
            <tr>
               <th>Number</th>
               <th>Name</th>
            </tr>
         </thead>
         
         <tbody>
        @if($scorers)
         @foreach($scorers as $scorer)

            <tr class="pick">
                <td>{{ $scorer->number }}</td>
                <td>{{ $scorer->name }}</td>
            </tr>

         @endforeach
        @else
          <tr class="pick">
              <td>No Goals Today!</td>
          </tr>
        @endif
         </tbody>
         
      </table>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="track_goal_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action='scores' method='POST'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Track Goal</h4>
      </div>
      <div class="modal-body">

        {!! csrf_field() !!}

         <div class="form-group">
            <label for="scoring_player">Track Goal</label>
            <select class="form-control" id="scoring_player" name="scoring_player">
                @foreach($players as $player)
                    <option value="{{ $player->id }}">
                        {{ $player->name }}
                    </option>
                @endforeach
            </select>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Goal!</button>
      </div>
      </form>
    </div>
  </div>
</div>

@stop