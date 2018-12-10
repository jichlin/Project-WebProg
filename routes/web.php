<?php

//Bagian buat login / register
Route::get('/login','LoginController@login');
Route::get('/','LoginController@login');
Route::get('/register','RegisterController@register');
Route::get('/logout','LoginController@logout');

//Buat Forum
Route::get('/forum','ThreadController@mainForum');
Route::get('/search','ThreadController@searchMainForum');

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
