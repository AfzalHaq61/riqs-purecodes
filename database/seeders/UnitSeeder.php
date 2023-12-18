<?php

namespace Database\Seeders;

use App\Models\Halqa;
use App\Models\Shehar;
use App\Models\Unit;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\str;

class UnitSeeder extends Seeder
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
                Unit::factory()
                    ->create([
                        'zone_id' => $status['zone_id'],
                        'shehar_id' => $status['shehar_id'],
                        'halqa_id' => $status['halqa_id'],
                        'name' => $status['name'],
                        'slug' => Str::slug($status['name']),
                    ]);
            });

            
    }

    private function data(): Collection
    {
        return collect([
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'halqa_id' => Halqa::whereSlug('halqa-1')->first()->id,
                'name' => 'Unit Deans',
            ],
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'halqa_id' => Halqa::whereSlug('halqa-1')->first()->id,
                'name' => 'Unit Jalozai',
            ]
        ]);
    }
}
