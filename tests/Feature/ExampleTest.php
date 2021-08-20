<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $response = $this->get('/');

        $response->assertSeeInOrder(['Laravel', 'Documentation']);
    }

    /** @test */
    public function about_route_return_something() {
        $response = $this->get('/about');

        // dd($response);

        $response->assertSee('About');
    }
}
