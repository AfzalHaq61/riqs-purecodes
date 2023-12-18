<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Region;
use App\Models\Resource;
use App\Models\ResourceSemester;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
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
            'center_id' => Center::factory(),
            'semester_number' => $this->faker->randomNumber(),
            'semester_shuraka' => Resource::Factory(), 
            'muhazir_id' => Resource::factory(),
            'mawin_muhazir_id' => Resource::factory(),
            'start_date' => $this->faker->date('Y_m_d'),
            'end_date' => $this->faker->date('Y_m_d'),
            'region_id' => Region::factory(),
            'zone_id' => Zone::factory(),
        ];
    }
}
