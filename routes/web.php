<?php

Route::get('/login','UserController@login');
Route::get('/','UserController@login');
Route::get('/register','UserController@register');
Route::get('/logout','UserController@logout');
Route::get('/search','ThreadController@searchMainForum');

//Bagian buat login / register
Route::get('/login','LoginController@login');
Route::get('/','LoginController@login');
Route::get('/register','RegisterController@register');
Route::get('/logout','LoginController@logout');

//Buat Forum
Route::get('/forum','ThreadController@mainForum');
Route::get('/create','ThreadController@createAdd');
Route::post('/store','ThreadController@store');
Route::get('/edit/{id}','ThreadController@edit');
Route::put('/update/{id}','ThreadController@update');


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

//CATEGORY
Route::get('/master/category','CategoryController@index');
Route::post('/master/category/add','CategoryController@add');
Route::delete('/deleteCategory/{id}','CategoryController@remove');
Route::get('/editCategory/{id}','CategoryController@edit');
Route::put('/master/category/update/{id}','CategoryController@update');
