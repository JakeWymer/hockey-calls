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
    	$players = Player::all();

    	return view('home', compact(['players', 'competitors']));
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
