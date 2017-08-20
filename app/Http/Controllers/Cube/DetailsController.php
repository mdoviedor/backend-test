<?php

namespace App\Http\Controllers\Cube;

use App\Http\Controllers\Controller;
use App\Test;

/**
 * Class DetailsController
 * @package App\Http\Controllers\Cube
 */
class DetailsController extends Controller
{
    public function __invoke(Test $test)
    {
        return view('cube.details', [
            'test' => $test,
        ]);
    }
}
