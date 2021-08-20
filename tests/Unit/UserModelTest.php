<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_has_full_name_attribute()
    {
        // create user
        $user = User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'new@gmail.com',
            'password' => 'secret'
        ]);

        // assert user has full name
        $this->assertEquals('John Doe', $user->fullname);
    }
}
