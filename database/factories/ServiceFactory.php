<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->randomElement(['Cleaning', 'Plumbing', 'Electrical']),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->sentence,
        ];
    }
}
