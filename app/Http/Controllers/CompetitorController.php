<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Competitor;

class CompetitorController extends Controller
{
    function show() {
    	$competitors = Competitor::all();

    	return view('competitors.show', compact('competitors'));
    }

    function store(Request $request) {
    	Competitor::create([
			'name' => $request->name,
			'total_points' => 0,
			'submissions' => 0
		]);

    	return back();
    }
}
