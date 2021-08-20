<?php

namespace Tests\Unit;

use App\Models\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BeverageTest extends TestCase
{

    use DatabaseMigrations;

    private $beverage;

    public function setUp(): void {
        parent::setUp();
        $this->beverage = Beverage::factory()->make();
    }

    /** @test */
    public function beverage_has_name()
    {
        $this->assertNotEmpty($this->beverage->name);
    }

    /** @test */
    public function beverage_has_type()
    {
        $this->assertNotEmpty($this->beverage->type);
    }
}
