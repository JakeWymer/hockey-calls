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
        $wildcard_player_ids = [18, 22, 23, 24, 21, 14, 2, 3, 6, 8, 9, 10, 16, 17, 19, 20];
        $wildcard_players = collect(array());

        if($request->data == 'true' && $request->wildcard == 1) {
            $players = DB::table('players')
                        ->where('position', '=', 'D')
                        ->whereIn('id', $wildcard_player_ids)
                        ->get();
            return response()->json(['response' => $players], 200);
            
        }

        if($request->data == 'false' && $request->wildcard == 1) {
            $players = DB::table('players')
                        ->where('position', '!=', 'D')
                        ->whereIn('id', $wildcard_player_ids)
                        ->get();
            return response()->json(['response' => $players], 200);
            
        }

        if($request->data == 'true') {
            $players = DB::table('players')
                        ->where('position', '=', 'D')
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
