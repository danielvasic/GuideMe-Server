<?php

// Document root

Route::get('/', function()
{
	return Redirect::to('admin');
});


// Authentication

Route::get('login', 'AuthController@showLoginForm');
Route::post('login', 'AuthController@attemptLogin');
Route::get('logout', 'AuthController@attemptLogout');


// Administration

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	// dashboard

	Route::get('/', function()
	{
		return View::make('admin.dashboard');
	});

});


// API v1

Route::group(array('prefix' => 'api/v1'), function()
{
	// public

	Route::get('places', 'PlaceController@indexResource');
	Route::get('places/{id}', 'PlaceController@retrieveResource');

	Route::get('place_types', 'PlaceTypeController@indexResource');
	Route::get('place_types/{id}', 'PlaceTypeController@retrieveResource');

	Route::get('articles', 'ArticleController@indexResource');
	Route::get('articles/{id}', 'ArticleController@retrieveResource');

	Route::get('images', 'ImageController@indexResource');
	Route::get('images/{id}', 'ImageController@retrieveResource');


	Route::get('audio', 'AudioController@indexResource');
	Route::get('audio/{id}', 'AudioController@retrieveResource');

	Route::get('video', 'VideoController@indexResource');
	Route::get('video/{id}', 'VideoController@retrieveResource');

	// protected

	Route::group(array('before' => 'auth'), function()
	{
		// users

		Route::get('users', 'UserController@indexResource');
		Route::post('users', 'UserController@createResource');
		Route::get('users/{id}', 'UserController@retrieveResource');
		Route::put('users/{id}', 'UserController@updateResource');
		Route::delete('users/{id}', 'UserController@deleteResource');

		// groups

		Route::get('groups', 'GroupController@indexResource');
		Route::post('groups', 'GroupController@createResource');
		Route::get('groups/{id}', 'GroupController@retrieveResource');
		Route::put('groups/{id}', 'GroupController@updateResource');
		Route::delete('groups/{id}', 'GroupController@deleteResource');

		// places

		Route::post('places', 'PlaceController@createResource');
		Route::put('places/{id}', 'PlaceController@updateResource');
		Route::delete('places/{id}', 'PlaceController@deleteResource');

		// place_types

		Route::post('place_types', 'PlaceTypeController@createResource');
		Route::put('place_types/{id}', 'PlaceTypeController@updateResource');
		Route::delete('place_types/{id}', 'PlaceTypeController@deleteResource');

		// articles

		Route::post('articles', 'ArticleController@createResource');
		Route::put('articles/{id}', 'ArticleController@updateResource');
		Route::delete('articles/{id}', 'ArticleController@deleteResource');

		// images

		Route::post('images', 'ImageController@createResource');
		Route::put('images/{id}', 'ImageController@updateResource');
		Route::delete('images/{id}', 'ImageController@deleteResource');

		// audio

		Route::post('audio', 'AudioController@createResource');
		Route::put('audio/{id}', 'AudioController@updateResource');
		Route::delete('audio/{id}', 'AudioController@deleteResource');

		// video

		Route::post('video', 'VideoController@createResource');
		Route::put('video/{id}', 'VideoController@updateResource');
		Route::delete('video/{id}', 'VideoController@deleteResource');

	});

});
