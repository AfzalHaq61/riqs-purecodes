<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rahimia>
 */
class RahimiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'resource_id' => Resource::factory(),
            'date' => $this->faker->date('Y_m_d'),
            'received_amount' => $this->faker->randomNumber(),
            'received_by' => Resource::factory(),
            'receipt_no' => $this->faker->randomNumber(),
        ];
    }
}
