<?php

namespace App\Exports;

use App\Models\ResourceSemester;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportResourceSemester implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ResourceSemester::all();
    }
}
