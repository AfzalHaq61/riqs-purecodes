<?php

namespace Database\Factories;

use App\Models\Province;
use App\Models\Region;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zone::class;

    public function definition()
    {
        $name = $this->faker->name();
        return [
            'uuid' => $this->faker->uuid(),
            'province_id' => Province::factory(),
            'region_id' => Region::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
