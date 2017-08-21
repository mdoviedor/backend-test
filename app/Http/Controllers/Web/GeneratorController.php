<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Lib\CubeSummation\CubeSummation;
use App\Http\Lib\CubeSummation\DataPlainDriver;
use Illuminate\Http\Request;

/**
 * Class GeneratorController
 * @package App\Http\Controllers\Web
 */
class GeneratorController extends Controller
{
    public function generateAction()
    {
        return view('web.generate');
    }

    public function executeAction(Request $request)
    {
        $this->validate(request(), [
            'cases' => ['required'],
        ]);

        $data = trim($request->get('cases'));

        $dataPlainDriver = new DataPlainDriver($data);
        $cubeSummation = new CubeSummation($dataPlainDriver);

        try {
            $response = $cubeSummation->get();
        } catch (\Exception $exc) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['cases' => $exc->getMessage()]);
        }

        return view('web.generate', [
            'response' => $response,
        ]);
    }
}
