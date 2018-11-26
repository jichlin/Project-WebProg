<?php

Route::get('/login','UserController@login');
Route::get('/','UserController@login');
Route::get('/register','UserController@register');

