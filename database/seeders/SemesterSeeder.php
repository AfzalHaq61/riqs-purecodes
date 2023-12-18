<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Semester;
use App\Models\Zone;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;

class SemesterSeeder extends Seeder
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
                Semester::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'center_id' => $status['center_id'],
                        'semester_number' => $status['semester_number'],
                        'semester_shuraka' => $status['semester_shuraka'],
                        'muhazir_id' => $status['muhazir_id'],
                        'mawin_muhazir_id' => $status['mawin_muhazir_id'],
                        'start_date' => $status['start_date'],
                        'end_date' => $status['end_date'],
                        'region_id' => $status['region_id'],
                        'zone_id' => $status['zone_id'],
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'uuid' => str::uuid()->toString(),
                'center_id' => Center::first()->id,
                'semester_number' => 2,
                'semester_shuraka' => Resource::All()->count(),
                'muhazir_id' => Resource::first()->id,
                'mawin_muhazir_id' => Resource::first()->id,
                'start_date' => '2022/06/20',
                'end_date' => '2022/10/20',
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
            ],
            [
                'uuid' => str::uuid()->toString(),
                'center_id' => Center::first()->id,
                'semester_number' => 1,
                'semester_shuraka' => Resource::All()->count(),
                'muhazir_id' => Resource::first()->id,
                'mawin_muhazir_id' => Resource::first()->id,
                'start_date' => '2022/10/20',
                'end_date' => '2022/02/20',
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
            ],
            [
                'uuid' => str::uuid()->toString(),
                'center_id' => Center::first()->id,
                'semester_number' => 4,
                'semester_shuraka' => Resource::All()->count(),
                'muhazir_id' => Resource::first()->id,
                'mawin_muhazir_id' => Resource::first()->id,
                'start_date' => '2022/02/20',
                'end_date' => '2022/06/20',
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
            ],
        ]);
    }
}
