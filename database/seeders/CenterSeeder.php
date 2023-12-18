<?php

namespace Database\Seeders;

use App\Enums\CourseEnum;
use App\Models\Center;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->data()
            ->each(function ($status) {
                Center::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'name' => $status['name'],
                        'address' => $status['address'],
                        'course_id' => $status['course_id']
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'uuid' => str::uuid()->toString(),
                'name' => 'Halqa 1',
                'address' => 'University Road',
                'course_id' => CourseEnum::COURSE1,
            ],
            [
                'uuid' => str::uuid()->toString(),
                'name' => 'Halqa 2',
                'address' => 'University Town',
                'course_id' => CourseEnum::COURSE2,
            ],
            [
                'uuid' => str::uuid()->toString(),
                'name' => 'Halqa 1',
                'address' => 'University Garden',
                'course_id' => CourseEnum::COURSE3,
            ],
        ]);
    }
}
