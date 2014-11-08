<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$places = Place::orderBy('updated_at', 'desc')->get();
	return View::make('home')->with(array('places' => $places));
});

Route::get('add', function()
{
	return View::make('add');
});

Route::post('add', array('before' => 'csrf', function()
{
	$name = Input::get('place');

	$place = new Place;
	$place->name = $name;
	$place->save();

	return Redirect::to('/');
}));

Route::post('broken/{id}', array('before' => 'csrf', function($id)
{
	$place = Place::findOrFail($id);
	$place->increment('broken');
	return Redirect::to('/');
}));


Route::post('beingfixed/{id}', array('before' => 'csrf', function($id)
{
	$place = Place::findOrFail($id);
	$place->increment('beingfixed');
	return Redirect::to('/');
}));


Route::post('fixed/{id}', array('before' => 'csrf', function($id)
{
	$place = Place::findOrFail($id);
	$place->increment('fixed');
	return Redirect::to('/');
}));
