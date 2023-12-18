<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;
USE Illuminate\Support\Collection;

class ProvinceSeeder extends Seeder
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
                Province::factory()
                    ->create([
                        'name' => $status['name'],
                        'slug' => Str::slug($status['name']),
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'name' => 'Kpk',
            ],
            [
                'name' => 'Punjab',
            ],
            [
                'name' => 'Baluchistan',
            ],
            [
                'name' => 'Sindh',
            ],
        ]);
    }

}
