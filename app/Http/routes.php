<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@home');
Route::get('leaderboard', 'PageController@leaders');

Route::get('players', 'PlayersController@show');
Route::post('players', 'PlayersController@store');

Route::post('submissions', 'SubmissionsController@store');

Route::get('competitors', 'CompetitorController@show');
Route::post('competitors', 'CompetitorController@store');

Route::get('scores', 'ScoresController@show');
Route::post('scores', 'ScoresController@trackGoal');

Route::post('game/{id}', 'GamesController@close');

