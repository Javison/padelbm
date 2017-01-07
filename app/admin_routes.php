<?php

/*
|--------------------------------------------------------------------------
| ADMIN Application Routes
|--------------------------------------------------------------------------
*/


//BASIC CONTROLLERS
Route::get('admin', array('as' => 'admin', 'uses' => 'AdminPagesController@home'));
Route::get('/admin/home', 'AdminPagesController@home');
Route::get('/admin/messages', 'AdminPagesController@messages');
Route::get('/admin/reservations', 'AdminPagesController@reservations');

//MESSAGES
Route::resource('admin/messages', 'AdminMessagesController');

//MATCHES
Route::get('admin/matches', 'AdminMatchesController@index');

//DISCHARGE
Route::get('admin/discharge', 'AdminDischargeController@index');
Route::post('admin/dischargeCheck', 'AdminDischargeController@dischargeCheck');
Route::post('admin/dischargeOk', 'AdminDischargeController@dischargeOk');
Route::get('admin/dischargeCheck', 'AdminDischargeController@index');
Route::get('admin/dischargeOk', 'AdminDischargeController@index');


// RESOURCE CONTROLLERS //index, create, store, show, edit, update, destroy


