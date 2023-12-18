<?php

namespace Database\Seeders;

use App\Models\Maliyat;
use App\Models\Resource;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MaliyatSeeder extends Seeder
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
                Maliyat::factory()
                    ->create([
                        'uuid' => $status['uuid'],
                        'resource_id' => $status['resource_id'],
                        'date' => $status['date'],
                        'fixed_amount' => $status['fixed_amount'],
                        'received_amount' => $status['received_amount'],
                        'recieved_by' => $status['recieved_by'],
                        'receipt_no' => $status['receipt_no'],
                        'arrears' => $status['arrears'],
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
                'fixed_amount' => Resource::first()->maliyat,
                'received_amount' => '100',
                'recieved_by' => Resource::first()->id,
                'receipt_no' => '13827142',
                'arrears' => '342',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'resource_id' => Resource::first()->id,
                'date' => '2022/05/22',
                'fixed_amount' => Resource::first()->maliyat,
                'received_amount' => '200',
                'recieved_by' => Resource::first()->id,
                'receipt_no' => '13827142324',
                'arrears' => '342324',
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'resource_id' => Resource::first()->id,
                'date' => '2022/05/23',
                'fixed_amount' => Resource::first()->maliyat,
                'received_amount' => '150',
                'recieved_by' => Resource::first()->id,
                'receipt_no' => '138271423214',
                'arrears' => '342423',
            ]
        ]);
    }
}
