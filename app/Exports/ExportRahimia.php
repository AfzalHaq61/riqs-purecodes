<?php

namespace App\Exports;

use App\Models\Rahimia;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRahimia implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rahimia::all();
    }
}
