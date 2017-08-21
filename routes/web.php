<?php

Route::get('/', function () {
    return redirect()->route('web.cube.generator');
});

Route::get('cube/generator', [
    'as' => 'web.cube.generator',
    'uses' => 'Web\GeneratorController@generateAction',
]);

Route::post('cube/generator', [
    'as' => 'web.cube.generator.execute',
    'uses' => 'Web\GeneratorController@executeAction',
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
