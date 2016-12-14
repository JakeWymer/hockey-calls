@extends('app')


@section('content')
<div class="row">
    <h1 class="text-center">Today's Picks</h1>
</div>
<div class="row">
   <div class="col-md-9">
    @if($submissions)
    @foreach($games as $game)
      <table class = "table table-striped">
        <caption>{{ $game->date }}</caption>
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
          @foreach($submissions as $submission)
            @if($submission->id == $game->id)
              <tr class="pick">
                  <td>{{ $submission->name }}</td>
                  <td>{{ $submission->pick_one }}</td>
                  <td>{{ $submission->pick_two }}</td>
                  <td>{{ $submission->pick_three }}</td>
                  <td>{{ $submission->pick_wildcard }}</td>
                  <td>{{ $submission->points }}</td>
              </tr>
            @endif
          @endforeach
         </tbody>
         
      </table>
    @endforeach
    @endif
   </div>
</div>
  

@stop