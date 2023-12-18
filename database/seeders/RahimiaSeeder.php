<?php

namespace Database\Seeders;

use App\Models\Rahimia;
use App\Models\Resource;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RahimiaSeeder extends Seeder
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
                Rahimia::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'resource_id' => $status['resource_id'],
                        'date' => $status['date'],
                        'received_amount' => $status['received_amount'],
                        'received_by' => $status['received_by'],
                        'receipt_no' => $status['receipt_no'],
                    ]);
            });
    }

    private function data(): Collection
    {
        return collect([
            [
                'uuid' => Str::uuid()->toString(),
                'resource_id' => Resource::first()->id,
                'date' => '2022/05/20',
                'received_amount' => '100',
                'received_by' => Resource::first()->id,
                'receipt_no' => '13827142',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'resource_id' => Resource::first()->id,
                'date' => '2022/05/22',
                'received_amount' => '200',
                'received_by' => Resource::first()->id,
                'receipt_no' => '13827142324',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'resource_id' => Resource::first()->id,
                'date' => '2022/05/23',
                'received_amount' => '150',
                'received_by' => Resource::first()->id,
                'receipt_no' => '138271423214',
            ]
        ]);
    }
}
