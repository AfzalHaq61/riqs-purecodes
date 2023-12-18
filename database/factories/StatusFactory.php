<?php

namespace Database\Factories;

use App\Enums\StatusesEnum;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Status::class;

    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => $this->faker->randomElement(StatusesEnum::asArray()),
        ];
    }

    public function dawati()
    {
        return $this->state(function (array $attributes): array {
            return [
                'type' => StatusesEnum::DAWATI,
            ];
        });
    }


    public function intizami()
    {
        return $this->state(function (array $attributes): array {
            return [
                'type' => StatusesEnum::INTIZAMI,
            ];
        });
    }


    public function tarbiati()
    {
        return $this->state(function (array $attributes): array {
            return [
                'type' => StatusesEnum::TARBIATI,
            ];
        });
    }
}
