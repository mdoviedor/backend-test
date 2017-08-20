<?php

namespace App\Http\Controllers\Cube;

use App\Http\Controllers\Controller;

/**
 * Class ListController
 * @package App\Http\Controllers\Cube
 */
class ListController extends Controller
{
    public function __invoke()
    {
        $tests = auth()->user()->tests();

        $tests = $tests->orderBy('created_at', 'DESC')->paginate();

        return view('cube.list', [
            'tests' => $tests,
        ]);
    }
}
