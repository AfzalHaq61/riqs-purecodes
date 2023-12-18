<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                Role::factory()
                    ->create([
                        'name' => $status['name'],
                        'guard_name' => $status['guard_name'],
                    ]);
            });     
    }

    private function data(): Collection
    {
        return collect([
            [
                'name' => 'sadr-e-unit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'nazim-umoomi-unit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'coordinator-project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sadr-e-halqa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'nazim-umoomi-halqa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sadr-e-shehar',
                'guard_name' => 'web',
            ],
            [
                'name' => 'nazim-umoomi-shehar',
                'guard_name' => 'web',
            ],
            [
                'name' => 'nazim-e-dawat-shehar',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-sadr',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-umoomi',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-dawat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-zonal-dawati-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-tarbiat-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-zonal-tarbiati-committee-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-tarbiat-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-zonal-tarbiati-committee-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-malyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-zonal-malyat-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-rahimia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'zonal-nazim-e-nashriyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-zonal-nashriyat-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-sadr',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-umoomi',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-dawat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-regional-dawati-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-tarbiat-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-regional-tarbiati-committee-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-tarbiat-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-regional-tarbiati-committee-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-malyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-regional-malyat-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-rahimia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'regional-nazim-e-nashriyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-regional-nashriyat-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-sadr',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-umoomi',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-dawat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-sobayi-dawati-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-tarbiat-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-sobayi-tarbiati-committee-course-1',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-tarbiat-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-sobayi-tarbiati-committee-course-2',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-malyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-sobayi-malyat-committee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-rahimia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'sobayi-nazim-e-nashriyat',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member-sobayi-nashriyat-committee',
                'guard_name' => 'web',
            ],
        ]);
    }
}
