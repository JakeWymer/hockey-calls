<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Submission;
use App\Competitor;
use Alert;
use Carbon\Carbon;
use App\Game;

class SubmissionsController extends Controller
{
    function store(Request $request) {

        $competitor = Competitor::find($request->competitor_id);

        $competitor->submissions += 1;
        $competitor->save();

        $today = Carbon::today('America/Chicago')->format('Y/m/d');

        $game_id = DB::table('games')
            ->where('date', $today)
            ->where('status', 'active')
            ->pluck('id');

        if(count($game_id) == 0) {
            $game = Game::create(['date' => $today, 'status' => 'active']);
            $game_id = $game->id;
        } else {
            $game_id = $game_id[0];
        }

    	Submission::create([
    		'competitor_id' => $competitor->id,
    		'pick_one' => $request->pick_one,
    		'pick_two' => $request->pick_two,
    		'pick_three' => $request->pick_three,
    		'pick_wildcard' => $request->pick_wildcard,
            'game_id' => $game_id

    	]);

        alert()->success('Picks Submitted!', 'Good luck...');

    	return redirect('/scores');
    }
}
