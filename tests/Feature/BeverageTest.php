<?php

namespace Tests\Feature;

use App\Models\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function a_user_can_visit_a_beverage_page_and_see_beverages() {
      $beverage = Beverage::factory()->create();
      $response = $this->get('/beverages');
      $response->assertSee($beverage->name);
      $response->assertStatus(200);
    }
}
