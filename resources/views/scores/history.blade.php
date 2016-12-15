@extends('app')


@section('content')
<div class="row">
    <h1 class="text-center">Past Picks</h1>
</div>
<div class="row">
   <div class="col-md-12">
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
                  <td><div><img src="{{ $submission->pick_one->image_path }}"></img><h5>{{ $submission->pick_one->name }}</h5></div></td>
                  <td><div><img src="{{ $submission->pick_two->image_path }}"></img><h5>{{ $submission->pick_two->name }}</h5></div></td>
                  <td><div><img src="{{ $submission->pick_three->image_path }}"></img><h5>{{ $submission->pick_three->name }}</h5></div></td>
                  <td><div><img src="{{ $submission->pick_wildcard->image_path }}"></img><h5>{{ $submission->pick_wildcard->name }}</h5></div></td>
                  <td>{{ $submission->points }}</td>
              </tr>
            @endif
          @endforeach
         </tbody>
         
      </table>
    @endforeach
    @endif

</div>

@stop