<?php

Route::get('cube/list', [
    'as' => 'cube.list',
    'uses' => 'Cube\ListController',
]);

Route::get('cube/details/{test}', [
    'as' => 'cube.details',
    'uses' => 'Cube\DetailsController',
]);

Route::get('cube/generate_plain', [
    'as' => 'cube.generate_plain',
    'uses' => 'Cube\GeneratePlainController@generateAction',
]);

Route::post('cube/generate_plain', [
    'as' => 'cube.generate_plain.execute',
    'uses' => 'Cube\GeneratePlainController@executeAction',
]);
