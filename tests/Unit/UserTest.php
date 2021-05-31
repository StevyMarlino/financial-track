<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test route user.
     *
     * @return void
     * @test
     */
    public function Route()
    {
        $user = new User();

        $user->post('');


        $this->assertTrue(true);
    }
}
