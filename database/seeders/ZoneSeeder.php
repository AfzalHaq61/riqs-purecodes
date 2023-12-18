<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\str;

class ZoneSeeder extends Seeder
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
                Zone::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'province_id' => $status['province_id'],
                        'region_id' => $status['region_id'],
                        'name' => $status['name'],
                        'slug' => Str::slug($status['name']),
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'uuid' => Str::uuid()->toString(),
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'name' => 'Zone 1',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'name' => 'Zone 2',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'name' => 'Zone 3',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'name' => 'University Zone',
            ],
        ]);
    }
}
