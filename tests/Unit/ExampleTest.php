<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_has_age_attribute() {
        $user = User::factory()->make();

        $this->assertNotNull($user->age);
    }
}
