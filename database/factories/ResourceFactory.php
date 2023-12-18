<?php

namespace Database\Factories;

use App\Models\Halqa;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Shehar;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    public function definition()
    {

        return [
            'uuid' => $this->faker->uuid(),
            'first_name' => $this->faker->name(),
            'second_name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'cnic' => $this->faker->randomNumber(),
            'permanent_address' => $this->faker->text(),
            'present_address' => $this->faker->text(),
            'education' => $this->faker->text(),
            'user_id' => User::factory(),
            'dawati_status_id' => Region::factory(),
            'tarbiati_status_id' => Region::factory(),
            'intizami_status_id' => Region::factory(),
            'region_id' => Region::factory(),
            'zone_id' => Zone::factory(),
            'shehar_id' => Shehar::factory(),
            'halqa_id' => Halqa::factory(),
            'unit_id' => Unit::factory(),
            'maliyat' => $this->faker->randomNumber(),
        ];
    }
}
