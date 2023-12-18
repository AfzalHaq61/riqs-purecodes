<?php

namespace Database\Factories;

use App\Enums\CourseEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CenterFactory extends Factory
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
            'name' => $this->faker->name(),
            'address' => $this->faker->name(),
            'course_id' => $this->faker->randomElement(CourseEnum::asArray()),
        ];
    }
}
