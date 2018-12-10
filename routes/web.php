<?php

Route::get('/login','UserController@login');
Route::get('/','UserController@login');
Route::get('/register','UserController@register');
Route::get('/logout','UserController@logout');
Route::get('/search','ThreadController@searchMainForum');
Route::get('/forum','ThreadController@mainForum');


Route::post('/loginUser','UserController@loginUser');
Route::post('/registerUser','UserController@registerUser');

