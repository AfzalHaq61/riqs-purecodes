<?php

namespace Database\Seeders;

use App\Models\Halqa;
use App\Models\Shehar;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\str;

class HalqaSeeder extends Seeder
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
                Halqa::factory()
                    ->create([
                        'zone_id' => $status['zone_id'],
                        'shehar_id' => $status['shehar_id'],
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
                'name' => 'Halqa 1',
            ],
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'name' => 'Halqa 2',
            ],
            [
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'name' => 'Halqa Islamia College',
            ],
        ]);
    }
}
