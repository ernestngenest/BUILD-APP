<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InteriorDesign>
 */
class InteriorDesignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomNumber(1, \App\Models\Category::count()),
            'interior_design_name' => $this->faker->name(),
            'interior_design_description' => $this->faker->text(),
            'interior_design_image' => $this->faker->imageUrl(),
            'interior_design_price' => $this->faker->numberBetween(100000, 2147483647),
            'interior_design_quantity' => $this->faker->randomNumber(7, false),
            'last_update' => now(),
        ];
    }
}