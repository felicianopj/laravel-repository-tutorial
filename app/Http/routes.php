<?php

// Laravel Default Index Page

Route::get('/', function () {
    return view('welcome');
});

// Task Routes
Route::group(['prefix' => 'tasks'], function () {
	Route::get('/{id?}', [
	    'uses' => 'TaskController@getAllTasks',
	    'as' => 'task.index'
	]);

	Route::post('store', [
	    'uses' => 'TaskController@postStoreTask',
	    'as' => 'task.store'
	]);

	Route::patch('{id}/update', [
	    'uses' => 'TaskController@postUpdateTask',
	    'as' => 'task.update'
	]);

	Route::delete('{id}/delete', [
	    'uses' => 'TaskController@postDeleteTask',
	    'as' => 'task.delete'
	]);
});
