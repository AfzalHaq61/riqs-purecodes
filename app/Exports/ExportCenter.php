<?php

namespace App\Exports;

use App\Models\Center;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCenter implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Center::all();
    }
}
