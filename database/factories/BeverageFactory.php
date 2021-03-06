<?php

namespace Database\Factories;

use App\Models\Beverage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeverageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beverage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => 'Soft Drink'
        ];
    }
}
