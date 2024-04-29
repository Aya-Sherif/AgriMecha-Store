<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PModel>
 */
class PModelFactory extends Factory
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
            'name' => $this->faker->unique()->word, // Unique word for model name
            'price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000 with 2 decimal places
            'productname' => $this->faker->sentence, // Random sentence for product name
            'image' => $this->faker->imageUrl(), // Random image URL
            'description' => $this->faker->paragraph, // Random paragraph for description
            'discount' => $this->faker->randomFloat(2, 0, 50), // Random discount between 0 and 50 with 2 decimal places
            'quantity' => (5), // Random quantity between 0 and 100
            'additional_data' => json_encode(['Key' => $this->faker->word]),

        ];
    }
}
