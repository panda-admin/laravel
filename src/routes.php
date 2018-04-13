<?php

use Illuminate\Support\Facades\Route;

$attributes = [
    'prefix' => config('panda-admin.config.prefix'),
    'middleware' => config('panda-admin.config.middleware'),
    'namespace' => 'PandaAdmin\\Laravel\\Controllers',
];

Route::group($attributes, function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['prefix' => 'api', 'as' => 'admin.'], function() {
        Route::resource('/content_types', 'ContentTypeController');

        Route::get('/content/{content}', ['as' => 'content.index'],'ContentController@index');
        Route::post('/content/{content}', ['as' => 'content.store'], 'ContentController@store');
        Route::get('/content/{content}/create', ['as' => 'content.create'], 'ContentController@create');
        Route::get('/content/{content}/{id}', ['as' => 'content.show'], 'ContentController@show');
        Route::match(['put', 'patch'], '/content/{content}/{id}', ['as' => 'content.update'], 'ContentController@update');
        Route::delete('/content/{content}/{id}', ['as' => 'content.delete'], 'ContentController@delete');
        Route::get('/content/{content}/{id}/edit', ['as' => 'content.edit'], 'ContentController@edit');
    });
});