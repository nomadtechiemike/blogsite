<?php

Route::group(['namespace' => 'Botble\Comment\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('cms.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'comment'], function () {

            Route::get('/', [
                'as' => 'comment.list',
                'uses' => 'CommentController@getList',
            ]);

            Route::get('/create', [
                'as' => 'comment.create',
                'uses' => 'CommentController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'comment.create',
                'uses' => 'CommentController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'comment.edit',
                'uses' => 'CommentController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'comment.edit',
                'uses' => 'CommentController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'comment.delete',
                'uses' => 'CommentController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'comment.delete.many',
                'uses' => 'CommentController@postDeleteMany',
                'permission' => 'comment.delete',
            ]);

            Route::post('/change-status', [
                'as' => 'comment.change.status',
                'uses' => 'CommentController@postChangeStatus',
                'permission' => 'comment.edit',
            ]);
        });
    });
    
});