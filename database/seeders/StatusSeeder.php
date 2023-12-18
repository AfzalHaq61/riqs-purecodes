<?php

namespace Database\Seeders;

use App\Enums\StatusesEnum;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
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
                Status::factory()
                    ->create([
                        'name' => $status['name'],
                        'slug' => Str::slug($status['name']),
                        'type' => $status['type'],
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'name' => 'Muawin Daee',
                'type' => StatusesEnum::DAWATI,
            ],
            [
                'name' => 'Daee',
                'type' => StatusesEnum::DAWATI,
            ],
            [
                'name' => 'Muhazir e Dawat',
                'type' => StatusesEnum::DAWATI,
            ],
            [
                'name' => 'Member Sobai Dawate Comiite',
                'type' => StatusesEnum::DAWATI,
            ],
            [
                'name' => 'Mojawiza Maduu',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Maduu',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Madni Hall',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Course 1',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Course 2',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Course 3',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Mohazi Course 1',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Mohazi Course 2',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Mohazi Course 3',
                'type' => StatusesEnum::TARBIATI,
            ],
            [
                'name' => 'Nazim Umoomi Unit',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Sadr e Unit',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Coordinator Project',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Nazim Umoomi Halqa',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Sadr e Halqa',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Nazim Umoomi Shehar',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Sadr e Shehar',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Nazim e Dawat Shehar',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Sadr',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Umoomi',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Dawat',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Dawati Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Tarbiat Course 1',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Tarbiati Committee Course 1',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Tarbiat Course 2',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Tarbiati Committee Course 2',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Malyat ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Malyat Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Rahimia ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Rahimia Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Zonal Nazim e Nashriyat ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Zonal Nashriyat Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Sadr',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Umoomi',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Dawat',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Dawati Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Tarbiat Course 1',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Tarbiati Committee Course 1',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Tarbiat Course 2',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Tarbiati Committee Course 2',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Malyat ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Malyat Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Rahimia ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Rahimia Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Regionol Nazim e Nashriyat ',
                'type' => StatusesEnum::INTIZAMI,
            ],
            [
                'name' => 'Member Regionol Nashriyat Committee',
                'type' => StatusesEnum::INTIZAMI,
            ],
        ]);
    }
}
