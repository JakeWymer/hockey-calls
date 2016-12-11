<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;


class Game extends Model
{
    protected $fillable = ['date','status',];

    public function players() {
    	return $this->belongsToMany(Player::class);
    }
}
