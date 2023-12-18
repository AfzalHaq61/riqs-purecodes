<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MaliyatFactory extends Factory
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
            'fixed_amount' => Resource::first()->maliyat,
            'received_amount' => $this->faker->randomNumber(),
            'recieved_by' => Resource::factory(),
            'receipt_no' => $this->faker->randomNumber(),
            'arrears' => $this->faker->randomNumber(),
        ];
    }
}
