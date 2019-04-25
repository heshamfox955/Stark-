<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Config::set('auth.defines', 'admin');
    //Route::get('login', 'AdminController@login');
    //Route::post('login', 'AdminController@dologin');
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => 'admin:admin'], function() {
        Route::get('home', 'AdminController@index');
        Route::get('logout', 'AdminController@logout');

        //Admin Route

        Route::match(['get', 'post'], 'add-user', 'AdminController@addUsers');
        Route::match(['get', 'post'], 'edit-admin/{id}', 'AdminController@editAdmin');
        Route::get('delete-admin/{id}', 'AdminController@delAdmin');
        //Route::get('edit-admin/{id}', 'AdminController@edit');
        //Route::post('edit-admin/{id}', 'AdminController@update');
        Route::get('view/admins', 'AdminController@viewAdmin');

        //Category Route

        Route::match(['get', 'post'], 'add-category', 'CategoryController@addCategory');
        Route::match(['get', 'post'], 'edit-category/{id}', 'CategoryController@editCategory');
        Route::get('delete-category/{id}', 'CategoryController@delCategory');
        Route::get('view/categories', 'CategoryController@viewCategory');

        //Play List Route

        Route::match(['get', 'post'], 'add-playlist', 'PlayListController@addPlaylist');
        Route::match(['get', 'post'], 'edit-playlist/{id}', 'PlayListController@editPlaylist');
        Route::get('delete-playlist/{id}', 'PlayListController@deletePlaylist');
        Route::get('view/playlists', 'PlayListController@viewPlaylist');


        //Musics Route

        Route::get('add-music', 'MusicController@addMusic')->name('addMusic');
        Route::post('add-music', 'MusicController@uploadMusic')->name('addMusic');
        Route::get('edit-music/{id}', 'MusicController@editMusic');
        Route::post('edit-music/{id}', 'MusicController@updateMusic')->name('updateMusic');
        Route::get('delete-music/{id}', 'MusicController@delMusic');
        Route::get('view/music', 'MusicController@viewMusic');

    });

});