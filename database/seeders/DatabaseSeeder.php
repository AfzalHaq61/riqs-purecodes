<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            ProvinceSeeder::class,
            RegionSeeder::class,
            ZoneSeeder::class,
            SheharSeeder::class,
            HalqaSeeder::class,
            UnitSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            ResourceSeeder::class,
            MaliyatSeeder::class,
            RahimiaSeeder::class,
            CenterSeeder::class,
            SemesterSeeder::class,
        ]);
    }
}
