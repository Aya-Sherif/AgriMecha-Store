<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title,
            'subtitle'=>$this->faker->text('120'),
            'content' => json_encode(['paragraphs' => $this->faker->paragraphs(3, true)]),
            'image'=>'1.jpg'
            //
        ];
    }
}
