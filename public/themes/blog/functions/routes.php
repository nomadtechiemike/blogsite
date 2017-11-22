<?php

require_once __DIR__ . '/../vendor/autoload.php';

Route::group(['namespace' => 'Theme\Blog\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/test', [
            'uses' => 'BlogController@test',
        ]);

    });

});
