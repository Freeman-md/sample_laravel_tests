<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;

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

    /** @test */
    public function a_minor_user_cannot_buy_alcoholic_beverage() {
        
        $beverage = Beverage::factory()->make([
            'type' => 'Alcoholic'
        ]);

        $user = User::factory()->make([
            'age' => 17
        ]);
        
        $this->actingAs($user);

        $this->expectException(MinorCannotBuyAlcoholicBeverageException::class);

        $beverage->buy();

    }
}
