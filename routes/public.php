<?php

Route::get('/', function () {
    return redirect()->route('cube_summation.public_generator');
});

Route::get('cube/public_generator', [
    'as' => 'cube.public_generator',
    'uses' => 'Cube\PublicGeneratorController@generateAction',
]);

Route::post('cube/public_generator', [
    'as' => 'cube.public_generator.execute',
    'uses' => 'CUbe\PublicGeneratorController@executeAction',
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
