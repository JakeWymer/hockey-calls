<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Game;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number',
    ];

    public function games() {
    	return $this->belongsToMany(Player::class);
    }
}
