<?php

Route::get('/login','UserController@login');
Route::get('/','UserController@login');
Route::get('/register','UserController@register');
Route::get('/logout','UserController@logout');

//Bagian buat login / register
Route::get('/login','LoginController@login');
Route::get('/','LoginController@login');
Route::get('/register','RegisterController@register');
Route::get('/logout','LoginController@logout');

//Buat Forum
Route::get('/forum/{id}/search','ThreadController@searchForumDetail');
Route::get('/forum/search','ThreadController@searchMainForum'); // search main thread
Route::get('/forum','ThreadController@mainForum'); // menampilkan main thread
Route::get('/forum/create','ThreadController@createAdd'); // menambah thread
Route::get('/forum/{id}/edit/{post_id}','ThreadController@editThread'); // edit post di dalam suatu thread detail
Route::post('/forum/{id}/store/{post_id}','ThreadController@storeThread'); // menambah post di dalam suatu thread detail
Route::put('/forum/{id}/update/{post_id}','ThreadController@updateThread'); // mengupdate post didalam suatu thread detail
Route::delete('/forum/{id}/delete/{post_id}','ThreadController@destroyThreadDetails'); // mendelete post didalam suatu thread detail
Route::get('/forum/{id}','ThreadController@detailThread'); // menampilkan thread detail suatu thread
Route::get('/forum/edit/{id}','ThreadController@edit'); // edit thread
Route::post('/forum/store','ThreadController@store'); // menambah thread
Route::put('/forum/update/{id}','ThreadController@update'); // edit thread


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
