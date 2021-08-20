<?php

namespace Tests\Feature;

use App\Models\Beverage;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    private $beverage;

    public function setUp(): void {
      parent::setUp();
      $this->beverage = Beverage::factory()->create();
    }

    /** @test  */
    public function a_user_can_visit_a_beverage_page_and_see_beverages() {
      $response = $this->get('/beverages');
      $response->assertSee($this->beverage->name);
      $response->assertStatus(200);
    }

    /** @test  */
    public function a_user_can_visit_a_single_beverage_page() {
      $response = $this->get("/beverages/{$this->beverage->id}");
      $response->assertSee($this->beverage->name);
      $response->assertStatus(200);
    }

    /** @test  */
    public function a_logged_in_user_can_buy_beverage() {
      $this->authenticate();
      $data = [
        'beverage_id' => $this->beverage->id,
        'price' => 200
      ];
      $response = $this->post('/beverages/buy', $data);

      $this->assertDatabaseHas('purchases', $data, 'sqlite');

      $response->assertStatus(201);

    }
}
