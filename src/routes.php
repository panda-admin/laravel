<?php

$attributes = [
    'prefix' => config('panda-admin.config.prefix'),
    'middleware' => config('panda-admin.config.middleware'),
    'namespace' => 'PandaAdmin\\Laravel\\Controllers',
];

Route::group($attributes, function() {
    Route::get('/', 'AdminController@index');
    Route::get('/contenttypes', 'ContentTypeController@index');
    Route::get('/contenttypes/{type}', 'ContentTypeController@show');

//    Route::get('/content/{contenttype}', 'ContentController@index');
//    Route::get('/content/{contenttype}/create', 'ContentController@create');
//    Route::post('/content/{contenttype}', 'ContentController@store');
//    Route::put('/content/{contenttype}/{id}', 'ContentController@update');
//    Route::delete('/content/{contenttype}/{id}', 'ContentController@delete');
//    Route::get('/content/{contenttype}', 'ContentController@index');
});