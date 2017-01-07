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
//Include Macros
include('macros.php');

/*ADMIN Routes*/
if (Request::is('admin*')){
	//if(Auth::check() && Auth::id() == 24)
    require __DIR__.'/admin_routes.php';
    //else return Redirect::to('/');
}

// HOME
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

// MATCHES
Route::get('matches', array('as' => 'matches', 'uses' => 'MatchesController@index'));
Route::any('/matches/{id}', 'MatchesController@showGameDetails');//Route any??

// TODO: Tournaments, lessons, facilities
Route::get('tournaments', array('as' => 'tournaments', 'uses' => 'PagesController@tournaments'));
Route::get('lessons', array('as' => 'lessons', 'uses' => 'PagesController@lessons'));
Route::get('facilities', array('as' => 'facilities', 'uses' => 'PagesController@facilities'));


// USER AUTHENTICATION
// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');

Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');

Route::get('users/confirm/{code}', 'UsersController@confirm');

Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');

Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');

Route::get('users/logout', 'UsersController@logout');

