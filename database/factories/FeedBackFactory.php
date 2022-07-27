<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedBack>
 */
class FeedBackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->userName(),
            'phone' => fake()->randomNumber(9),
            'email' => fake()->unique()->safeEmail(),
            'subject' => fake()->sentence(),
            'body' => fake()->text(500),
        ];
    }
}
