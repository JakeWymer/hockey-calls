<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'total_points', 'submissions'
    ];

    public function submissions() {
    	$this->hasMany('App\Submission');
    }
}
