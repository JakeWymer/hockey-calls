<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Competitor;
use App\Submission;
use DB;
use App\Player;
use Carbon\Carbon;
use App\Game;

class ScoresController extends Controller
{
    public function show() {

        $today = Carbon::today()->format('Y/m/d');

        $game = DB::table('games')
            ->where('date', $today)
            ->where('status', 'active')
            ->first();

        if(count($game) == 0 || $game->status == 'closed') {
            $game = new \stdClass();
            $game->id = -1;
        }

    	$submissions = DB::table('submissions')
    		->join('competitors','submissions.competitor_id','=','competitors.id')
    	    ->select('competitors.name',
    	    		'submissions.pick_one',
    	    		'submissions.pick_two', 
    	    		'submissions.pick_three', 
    	    		'submissions.pick_wildcard',
    	    		'submissions.points')
    		->where('submissions.game_id', $game->id)
    		->get();

        $players = Player::all();

    	return view('scores.show', compact('submissions', 'players', 'game'));
    }

    public function trackGoal(Request $request) {

        $today = Carbon::today()->format('Y/m/d');

        $game = DB::table('games')
            ->where('date', $today)
            ->where('status', 'active')
            ->first();

        $game = Game::find($game->id);

        $ineligiblePlayers = $game->players;

        $player_obj = DB::table('players')
            ->where('name', $request->scoring_player)
            ->first();
        $player_obj = Player::find($player_obj->id);

        if($ineligiblePlayers->contains($player_obj)) {
            alert()->error('Player Already Scored Today!', 'Good for him!');
            return redirect()->back();
        }

        $submissions = DB::table('submissions')
            ->where('submissions.game_id', $game->id)
            ->get();

        $scoring_player = $request->scoring_player;

        foreach ($submissions as $submission) {

            $currentSubmission = Submission::find($submission->id);

            if($currentSubmission->pick_one == $scoring_player ||
            $currentSubmission->pick_two == $scoring_player ||
            $currentSubmission->pick_three == $scoring_player) {

                $competitor = Competitor::find($submission->competitor_id);
                $competitor->total_points++;
                $competitor->save();

                $currentSubmission->points++;
                $currentSubmission->save();

            } elseif ($submission->pick_wildcard == $scoring_player) {

                $competitor = Competitor::find($submission->competitor_id);
                $competitor->total_points += 2;
                $competitor->save();

                $currentSubmission->points += 2;
                $currentSubmission->save();

            }

            if($currentSubmission->points == 5) {
                $currentSubmission->points += 5;
                $currentSubmission->save();
            }
        }

        $game->players()->attach($player_obj);

        alert()->success('What a Goal!', $scoring_player . ' is the best!');
        return redirect()->back();
    }

    public function submitScores()
    {
        dd('WORKS');
    }
}
