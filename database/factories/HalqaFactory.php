<?php

namespace Database\Factories;

use App\Models\Halqa;
use App\Models\Shehar;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Halqa>
 */
class HalqaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Halqa::class;

    public function definition()
    {
        $name = $this->faker->name();
        return [
            'zone_id' => Zone::factory(),
            'shehar_id' => Shehar::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
