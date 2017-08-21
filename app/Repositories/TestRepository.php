<?php

namespace App\Repositories;

use App\Models\Test;
use App\Models\User;

class TestRepository
{
    /**
     * @var Test
     */
    private $test;

    /**
     * TestRepository constructor.
     * @param Test $test
     */
    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    /**
     * @param Test $test
     * @param array $data
     */
    public function save(Test $test, array $data = [])
    {
        $test->save($data);
    }

    /**
     * @param int $size
     * @param User $user
     * @return Test
     */
    public function create(int $size, User $user): Test
    {
        $test = new Test();

        $test->size = $size;
        $test->user()->associate($user);

        $this->save($test);

        return $test;
    }
}
