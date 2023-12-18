<?php

namespace App\Exports;

use App\Enums\RolesEnum;
use App\Models\Halqa;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStructures implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (Auth::user()->hasAnyRole(RolesEnum::REGIONALSADR)) {
            return Zone::all();
        } else if (Auth::user()->hasAnyRole(RolesEnum::ZONALSADR)) {
            return Halqa::all();
        }
    }
}
