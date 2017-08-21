<?php

namespace App\Http\Controllers\Cube;

use App\Http\Controllers\Controller;
use App\Http\Lib\CubeSummation\CubeSummation;
use App\Http\Lib\CubeSummation\DataPlainDriver;
use App\Repositories\CubeRepository;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;

/**
 * Class GeneratePlainController
 * @package App\Http\Controllers\Cube
 */
class GeneratePlainController extends Controller
{
    /**
     * @var TestRepository
     */
    private $testRepository;
    /**
     * @var CubeRepository
     */
    private $cubeRepository;

    /**
     * GeneratePlainController constructor.
     * @param TestRepository $testRepository
     * @param CubeRepository $cubeRepository
     */
    public function __construct(TestRepository $testRepository, CubeRepository $cubeRepository)
    {
        $this->testRepository = $testRepository;
        $this->cubeRepository = $cubeRepository;
    }

    /**
     * @return mixed
     */
    public function generateAction()
    {
        return view('cube.generate_plain');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function executeAction(Request $request)
    {
        $this->validate($request, [
            'cases' => ['required'],
        ]);

        $data = trim($request->get('cases'));

        $dataPlainDriver = new DataPlainDriver($data);
        $cubeSummation = new CubeSummation($dataPlainDriver);

        $user = auth()->user();

        try {
            $response = $cubeSummation->get();

            $test =  $this->testRepository->create($response['T'], $user);

//            $test = auth()->user()->createTest([
//                'size' => $response['T'],
//            ]);

            foreach ($response['cases'] as $case) {
                $cube =  $this->cubeRepository->create($test, $case['matrix_size'], $case['number_operations']);
//                $cube = $test->createCube([
//                    'matrix_size' => $case['matrix_size'],
//                    'number_operations' => $case['number_operations'],
//                ]);

                foreach ($case['operation'] as $operation) {
                    $cube->createOperation($operation);
                }
            }

            return redirect()->route('cube.details', [$test->id]);
        } catch (\Exception $exc) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors(['cases' => $exc->getMessage()]);
        }

        return view('cube.generate_plain');
    }
}
