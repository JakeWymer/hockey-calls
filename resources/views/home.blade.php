@extends('app')


@section('content')

<div class="submission_form">
    <form method="POST" action='{{ url("/submissions") }}'>

      {!! csrf_field() !!}
      <div class="form-group">
        <label for="pick-one">Pick One:</label>
        <div class="row">
          <div class="col-xs-2"><input type="checkbox" data-token="{{ csrf_token() }}" data-toggle="toggle" data-on="Defense" data-off="Offense" id="pick_one_toggle"></div>
          <div class="col-xs-6">
            <select class="form-control" id="pick_one" name="pick_one" data-token="{{ csrf_token() }}">
                @foreach($players as $player)
                    <option value="{{ $player->id }}">
                      {{ $player->name }}
                    </option>
                @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="pick-two">Pick Two:</label>
        <div class="row">
          <div class="col-xs-2"><input type="checkbox" data-token="{{ csrf_token() }}" data-toggle="toggle" data-on="Defense" data-off="Offense" id="pick_two_toggle"></div>
          <div class="col-xs-6">
            <select class="form-control" id="pick_two" name="pick_two" data-token="{{ csrf_token() }}">
                @foreach($players as $player)
                    <option value="{{ $player->id }}">
                       {{ $player->name }}
                    </option>
                @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="pick-three">Pick Three:</label>
        <div class="row">
          <div class="col-xs-2"><input type="checkbox" data-token="{{ csrf_token() }}" data-toggle="toggle" data-on="Defense" data-off="Offense" id="pick_three_toggle"></div>
            <div class="col-xs-6">
              <select class="form-control" id="pick_three" name="pick_three" data-token="{{ csrf_token() }}">
                  @foreach($players as $player)
                      <option value="{{ $player->id }}">
                          {{ $player->name }}
                      </option>
                  @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="form-group">
        <label for="pick-wildcard">Wildcard Pick:</label>
        <div class="row">
          <div class="col-xs-2"><input type="checkbox" data-token="{{ csrf_token() }}" data-toggle="toggle" data-on="Defense" data-off="Offense" id="pick_wildcard_toggle"></div>
            <div class="col-xs-6">
              <select class="form-control" id="pick_wildcard" name="pick_wildcard" data-token="{{ csrf_token() }}">
                  @foreach($players as $player)
                      <option value="{{ $player->id }}">
                          {{ $player->name }}
                      </option>
                  @endforeach
              </select>
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="row">
   <div class="col-md-12">
      <table class = "table table-striped">
         <thead>
            <tr>
               <th>Pick One</th>
               <th>Pick Two</th>
               <th>Pick Three</th>
               <th>Wildcard</th>
            </tr>
         </thead>
         
         <tbody>

            <tr class="pick">
                <td class="chosen_pick_one"></td>
                <td class="chosen_pick_two"></td>
                <td class="chosen_pick_three"></td>
                <td class="chosen_pick_wildcard"></td>
            </tr>

         </tbody>
         
      </table>
   </div>
</div>

@stop