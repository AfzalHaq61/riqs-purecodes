<?php

namespace App\Exports;

use App\Models\Maliyat;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMaliyat implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Maliyat::all();
    }
}
