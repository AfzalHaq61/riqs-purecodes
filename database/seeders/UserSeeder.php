<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                User::factory()
                    ->create([
                        'email' => $status['email'],
                        'password' => Hash::make('password'),
                    ]);
            });

            
    }

    private function data(): Collection
    {
        return collect([
            [
                'email' => 'afzal100@gmail.com',
            ],
            [
                'email' => 'zeshan77@gmail.com',
            ]
        ]);
    }
}
