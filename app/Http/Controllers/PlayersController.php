<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;

class PlayersController extends Controller
{
    function show() {
    	$players = Player::all();

    	return view('players.show', compact('players'));
    }

    function store(Request $request) {
    	
    	Player::create([
			'name' => $request->name, 
			'number' => $request->number
    	]);

    	return back();
    }
}
