<?php

namespace Database\Seeders;

use App\Models\Shehar;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\str;

class SheharSeeder extends Seeder
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
                Shehar::factory()
                    ->create([
                        'name' => $status['name'],
                        'zone_id' => $status['zone_id'],
                        'slug' => Str::slug($status['name']),
                    ]);
            });

            
    }

    private function data(): Collection
    {
        return collect([
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'name' => 'Uet Shehar',
            ],
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'name' => 'Peshawar University Shehar',
            ],
        ]);
    }
}
