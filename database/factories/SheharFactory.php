<?php

namespace Database\Factories;

use App\Models\Shehar;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shehar>
 */
class SheharFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shehar::class;

    public function definition()
    {
        $name = $this->faker->name();
        return [
            'zone_id' => Zone::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
