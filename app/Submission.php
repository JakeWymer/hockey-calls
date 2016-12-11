<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Game;

class Submission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'competitor_id', 'pick_one', 'pick_two', 'pick_three', 'pick_wildcard', 'game_id', 'points',
    ];

    public function game() {
    	return $this->belongsTo(Game::class);
    }
    
}
