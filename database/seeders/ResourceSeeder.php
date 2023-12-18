<?php

namespace Database\Seeders;

use App\Models\Halqa;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Shehar;
use App\Models\Status;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ResourceSeeder extends Seeder
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
                Resource::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'first_name' => $status['first_name'],
                        'second_name' => $status['second_name'],
                        'father_name' => $status['father_name'],
                        'email' => $status['email'],
                        'phone_number' => $status['phone_number'],
                        'cnic' => $status['cnic'],
                        'permanent_address' => $status['permanent_address'],
                        'present_address' => $status['present_address'],
                        'education' => $status['education'],
                        'user_id' => $status['user_id'],
                        'dawati_status_id' => $status['dawati_status_id'],
                        'tarbiati_status_id' => $status['tarbiati_status_id'],
                        'intizami_status_id' => $status['intizami_status_id'],
                        'region_id' => $status['region_id'],
                        'zone_id' => $status['zone_id'],
                        'shehar_id' => $status['shehar_id'],
                        'halqa_id' => $status['halqa_id'],
                        'unit_id' => $status['unit_id'],
                        'maliyat' => $status['maliyat'],
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Afzal',
                'second_name' => 'Haq',
                'father_name' => 'Ihsan Ul Haq',
                'email' => 'afzal100@gmail.com',
                'phone_number' => '03419243170',
                'cnic' => '1560703867457',
                'permanent_address' => 'Mingora Swat',
                'present_address' => 'DhobiGhat Peshawar',
                'education' => 'Bs Computer System Engineering',
                'user_id' => User::first()->id,
                'dawati_status_id' => Status::whereSlug('muhazir-e-dawat')->first()->id,
                'tarbiati_status_id' => Status::whereSlug('course-3')->first()->id,
                'intizami_status_id' => Status::whereSlug('sadr-e-halqa')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'halqa_id' => Halqa::whereSlug('halqa-1')->first()->id,
                'unit_id' => Unit::whereSlug('unit-deans')->first()->id,
                'maliyat' => '1000',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Abdul',
                'second_name' => 'Haq',
                'father_name' => 'Ihsan Ul Haq',
                'email' => 'abdul100@gmail.com',
                'phone_number' => '03419243170',
                'cnic' => '1560703867457',
                'permanent_address' => 'Mingora Swat',
                'present_address' => 'DhobiGhat Peshawar',
                'education' => 'Bs Computer System Engineering',
                'user_id' => User::first()->id,
                'dawati_status_id' => Status::whereSlug('daee')->first()->id,
                'tarbiati_status_id' => Status::whereSlug('course-2')->first()->id,
                'intizami_status_id' => Status::whereSlug('sadr-e-unit')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'halqa_id' => Halqa::whereSlug('halqa-2')->first()->id,
                'unit_id' => Unit::whereSlug('unit-deans')->first()->id,
                'maliyat' => '2000',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'ihsan',
                'second_name' => 'Haq',
                'father_name' => 'Ihsan Ul Haq',
                'email' => 'ihsan100@gmail.com',
                'phone_number' => '03419243170',
                'cnic' => '1560703867457',
                'permanent_address' => 'Mingora Swat',
                'present_address' => 'DhobiGhat Peshawar',
                'education' => 'Bs Computer System Engineering',
                'user_id' => User::first()->id,
                'dawati_status_id' => Status::whereSlug('muawin-daee')->first()->id,
                'tarbiati_status_id' => Status::whereSlug('course-1')->first()->id,
                'intizami_status_id' => Status::whereSlug('zonal-sadr')->first()->id,
                'region_id' => Region::whereSlug('peshawar')->first()->id,
                'zone_id' => Zone::whereSlug('university-zone')->first()->id,
                'shehar_id' => Shehar::whereSlug('uet-shehar')->first()->id,
                'halqa_id' => Halqa::whereSlug('halqa-islamia-college')->first()->id,
                'unit_id' => Unit::whereSlug('unit-deans')->first()->id,
                'maliyat' => '3000',
            ]
        ]);
    }
}
