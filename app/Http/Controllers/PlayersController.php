<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use DB;

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

    public function getPlayers(Request $request) {

        $players;

        if($request->data == 'true') {
            $players = DB::table('players')
                        ->where('position', '!=', 'LW')
                        ->where('position', '!=', 'RW')
                        ->where('position', '!=', 'C')
                        ->get();
        }

        if($request->data == 'false') {
            $players = DB::table('players')
                        ->where('position', '!=', 'D')
                        ->get();
        }
        return response()->json(['response' => $players], 200);
    }

    public function updateChoice(Request $request) {

        $player = Player::find($request->data);

        return response()->json(['response' => $player], 200);
    }
}
