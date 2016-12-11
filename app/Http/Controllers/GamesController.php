<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;

class GamesController extends Controller
{
    public function close($id) {
    	$game = Game::find($id);
    	$game->status = 'closed';
    	$game->save();

    	alert()->success('Game Has Been Closed!', 'Goals can no longer be tracked');
        return redirect()->back();
    }
}
