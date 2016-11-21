<?php

Route::get('teste/{timezone}', 'LukasGreed\posts\app\Controllers\PostsController@index');

Route::group(array('prefix' => 'api'), function() {
    Route::resource('categorias', 'LukasGreed\posts\app\Controllers\CategoriasController', array('only' => array(
            'index',
            'store',
            'show',
            'update',
            'destroy'
    )));
    Route::resource('posts', 'LukasGreed\posts\app\Controllers\PostsController', array('only' => array(
            'index',
            'store',
            'show',
            'update',
            'destroy'
    )));
});
