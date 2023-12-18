<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;
USE Illuminate\Support\Collection;

class RegionSeeder extends Seeder
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
                Region::factory()
                    ->create([
                        'name' => $status['name'],
                        'province_id' => $status['province_id'],
                        'slug' => Str::slug($status['name']),
                    ]);
            });

            
    }

    private function data(): Collection
    {
        return collect([
            [
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'name' => 'Peshawar',
            ],
            [
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'name' => 'Hazara',
            ],
            [
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'name' => 'Malakand',
            ],
            [
                'province_id' => Province::whereSlug('kpk')->first()->id,
                'name' => 'Mardan',
            ],
        ]);
    }
}
