<?php

Route::get('/login','UserController@login');
Route::get('/','UserController@login');
Route::get('/register','UserController@register');
Route::get('/logout','UserController@logout');
Route::get('/forum/search','ThreadController@searchMainForum');

//Bagian buat login / register
Route::get('/login','LoginController@login');
Route::get('/','LoginController@login');
Route::get('/register','RegisterController@register');
Route::get('/logout','LoginController@logout');

//Buat Forum
Route::get('/forum','ThreadController@mainForum');
Route::get('/forum/create','ThreadController@createAdd');
Route::get('/forum/{id}/edit/{post_id}','ThreadController@editThread');
Route::post('/forum/{id}/store/{post_id}','ThreadController@storeThread');
Route::put('/forum/{id}/update/{post_id}','ThreadController@updateThread');
Route::delete('/forum/{id}/delete/{post_id}','ThreadController@destroyThreadDetails');
Route::get('/forum/{id}','ThreadController@detailThread');
Route::get('/forum/edit/{id}','ThreadController@edit');
Route::post('/forum/store','ThreadController@store');
Route::put('/forum/update/{id}','ThreadController@update');


//Buat Thread

//Buat User
//Buat add , update data user
Route::get('/userform/{from}/{id?}','UserController@addeditUserData');
Route::get('/profile/{username}','UserController@profile');
Route::get('/master/user','UserController@index');

//Buat Post Request
Route::post('/loginUser','LoginController@loginUser');
Route::post('/registerUser','RegisterController@registerUser');

Route::post('/newUserData','UserController@postUserData');

//Buat Put Request
Route::put('/updateUserData','UserController@putUserData');
Route::put('/modifyPop','UserController@modifyPop');


//Buat delete request
Route::delete('/deleteUser/{id}','UserController@remove');
