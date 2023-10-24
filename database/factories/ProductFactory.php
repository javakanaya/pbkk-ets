<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'condition_id' => $this->faker->numberBetween(1, 3),
            'type_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->sentence($this->faker->numberBetween(1, 3)),
            'description' => collect($this->faker->paragraphs($this->faker->numberBetween(4, 7)))->implode(''),
            'stock' => $this->faker->numberBetween(0, 100),
            'fault' => $this->faker->paragraph(),
            'image' => 'products/' . $this->faker->image('public/storage/products', 500, 500, null, false),
        ];
    }
}
