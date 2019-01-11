<?php
//Bagian buat login / register
Route::get('/login', 'LoginController@login');
Route::get('/', 'ThreadController@mainForum');
Route::get('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');
Route::get('/forum', 'ThreadController@mainForum'); // menampilkan main thread
Route::get('/forum/search', 'ThreadController@searchMainForum'); // search main thread
Route::post('/loginUser', 'LoginController@loginUser');
Route::post('/registerUser', 'RegisterController@registerUser');
Route::get('/forum/{id}/search', 'ThreadController@searchForumDetail');


Route::middleware(['needLogin'])->group(function () {
    //Buat Forum
    Route::get('/forum/create', 'ThreadController@createAdd'); // menambah thread
    Route::get('/forum/{id}/edit/{post_id}', 'ThreadController@editThread'); // edit post di dalam suatu thread detail
    Route::post('/forum/{id}/store/{post_id}', 'ThreadController@storeThread'); // menambah post di dalam suatu thread detail
    Route::put('/forum/{id}/update/{post_id}', 'ThreadController@updateThread'); // mengupdate post didalam suatu thread detail
    Route::delete('/forum/{id}/delete/{post_id}', 'ThreadController@destroyThreadDetails'); // mendelete post didalam suatu thread detail
    Route::get('/forum/{id}', 'ThreadController@detailThread'); // menampilkan thread detail suatu thread
    Route::get('/forum/edit/{from}/{id}', 'ThreadController@edit'); // edit thread
    Route::post('/forum/store', 'ThreadController@store'); // menambah thread
    Route::put('/forum/update/{id}', 'ThreadController@update'); // edit thread
    Route::get('/myforum', 'ThreadController@myforum');

//Buat User
    Route::get('/userform/{from}/{id?}', 'UserController@addeditUserData');
    Route::get('/profile/{username}', 'UserController@profile');
    Route::get('/inbox', 'InboxController@index');
    Route::post('/sendMessage', 'InboxController@sendMessage');
    Route::post('/newUserData', 'UserController@postUserData');
    Route::put('/updateUserData', 'UserController@putUserData');
    Route::put('/modifyPop', 'UserController@modifyPop');
    Route::delete('/deleteMessage/{id}', 'InboxController@deleteMessage');
    Route::put('/closeForum/{from}/{id}', 'ThreadController@closeForum');

    Route::middleware(['adminOnly'])->group(function () {
//Buat MasterUser
        Route::get('/master/user', 'UserController@index');
        Route::delete('/deleteUser/{id}', 'UserController@remove');

//Buat MasterForum
        Route::get('/master/forum', 'ThreadController@masterForum');
        Route::delete('/deleteForum/{id}', 'ThreadController@deleteForum');

//Buat Category
        Route::get('/master/category', 'CategoryController@index');
        Route::post('/master/category/add', 'CategoryController@add');
        Route::delete('/deleteCategory/{id}', 'CategoryController@remove');
        Route::get('/editCategory/{id}', 'CategoryController@edit');
        Route::put('/master/category/update/{id}', 'CategoryController@update');
    });
});




