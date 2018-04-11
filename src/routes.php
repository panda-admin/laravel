<?php

$attributes = [
    'prefix' => config('panda-admin.config.prefix'),
    'middleware' => config('panda-admin.config.middleware'),
    'namespace' => 'PandaAdmin\\Laravel\\Controllers',
];

Route::group($attributes, function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['prefix' => 'api', 'as' => 'admin.'], function() {
        Route::resource('/content_types', 'ContentTypeController');

        Route::get('/content/{content}', 'ContentController@index')->name('content.index');
        Route::post('/content/{content}', 'ContentController@store')->name('content.store');
        Route::get('/content/{content}/create', 'ContentController@create')->name('content.create');
        Route::get('/content/{content}/{id}', 'ContentController@show')->name('content.show');
        Route::match(['put', 'patch'], '/content/{content}/{id}', 'ContentController@update')->name('content.update');
        Route::delete('/content/{content}/{id}', 'ContentController@delete')->name('content.delete');
        Route::get('/content/{content}/{id}/edit', 'ContentController@edit')->name('content.edit');
    });
});