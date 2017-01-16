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

Route::auth();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'ScoresController@show');
	Route::get('scores', 'ScoresController@show');
	Route::get('leaderboard', 'PageController@leaders');

	Route::get('players', 'PlayersController@show');
	Route::post('players', 'PlayersController@store');
	Route::post('players/get', 'PlayersController@getPlayers');
	Route::post('players/updateChoice', 'PlayersController@updateChoice');


	Route::post('submissions', 'SubmissionsController@store');

	Route::get('competitors', 'CompetitorController@show');
	Route::post('competitors', 'CompetitorController@store');

	Route::get('picks', 'PageController@home');
	Route::post('scores', 'ScoresController@trackGoal');
	Route::post('scores/edit', 'ScoresController@editGoal');

	Route::post('game/{id}', 'GamesController@close');

	Route::get('history', 'ScoresController@history');

	Route::get('messages', 'MessagesController@index');
	Route::post('messages', 'MessagesController@getGif');
});
