<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\Competitor;

class PageController extends Controller
{
    function home() {

    	$competitors = Competitor::all();
    	$players = Player::all()->keyBy('id');
        $wildcard_player_ids = [18, 22, 23, 24, 21, 14, 2, 3, 6, 8, 9, 10, 16, 17, 19, 20];
        $wildcard_players = collect(array());

        foreach ($wildcard_player_ids as $id) {
            if($players->contains($id)) {
                $players->forget($id);
                $wildcard_players->push(Player::find($id));
            }
        }

    	return view('home', compact(['players', 'competitors', 'wildcard_players']));
    }

    public function leaders() {
    	$competitors = Competitor::all();

    	foreach ($competitors as $competitor) {
    		if($competitor->submissions > 0) {
    			$competitor->ppg = $competitor->total_points/$competitor->submissions;
    		} else {
    			$competitor->ppg = 0;
    		}
    	}

    	return view('leaders', compact('competitors'));
    }
}
