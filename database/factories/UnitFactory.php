<?php

namespace Database\Factories;

use App\Models\Halqa;
use App\Models\Shehar;
use App\Models\Unit;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    public function definition()
    {
        $name = $this->faker->name();
        return [
            'zone_id' => Zone::factory(),
            'shehar_id' => Shehar::factory(),
            'halqa_id' => Halqa::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
