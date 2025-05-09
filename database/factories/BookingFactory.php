<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => '01' . $this->faker->numberBetween(700000000, 799999999),
            'service_id' => Service::factory(),
            'status' => 'pending',
            'schedule_time' => now()->addDays(1),
        ];
    }
}
