<?php

namespace App\Repositories;

use App\Models\Cube;
use App\Models\Test;

/**
 * Class CubeRepository
 * @package App\Repositories
 */
class CubeRepository
{
    /**
     * @var Cube
     */
    private $cube;

    /**
     * CubeRepository constructor.
     * @param Cube $cube
     */
    public function __construct(Cube $cube)
    {
        $this->cube = $cube;
    }


    /**
     * @param Cube $cube
     * @param array $data
     */
    public function save(Cube $cube, array $data = [])
    {
        $cube->save($data);
    }

    /**
     * @param Test $test
     * @param int $matrixSize
     * @param int $numberOperations
     * @return Cube
     */
    public function create(Test $test, int $matrixSize, int $numberOperations): Cube
    {
        $cube = new Cube();

        $cube->matrix_size = $matrixSize;
        $cube->number_operations = $numberOperations;

        $cube->test()->associate($test);

        $this->save($cube);

        return $cube;
    }
}
