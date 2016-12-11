@extends('app')


@section('content')
<div class="row">
    <h1 class="text-center">Leaderboard</h1>
</div>
<div class="row">
   <div class="col-md-9">
      <table class = "table table-striped">
         <thead>
            <tr>
               <th>Name</th>
               <th>Total Points</th>
               <th>Points Per Game</th>
            </tr>
         </thead>
         
         <tbody>
        @foreach($competitors as $competitor)

            <tr class="pick">
                <td>{{ $competitor->name }}</td>
                <td>{{ $competitor->total_points }}</td>
                <td>{{ $competitor->ppg }}</td>
            </tr>

        @endforeach

         </tbody>
         
      </table>
   </div>
</div>

@stop