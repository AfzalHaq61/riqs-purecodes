<?php

namespace App\Http\Controllers\Structures;

use App\Exports\ExportStructures;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class StructureExportController extends Controller
{
    public function __invoke()
    {
        dd("hello");
        $filename = Carbon::now()->format('Ymdhms') . '_resource.xlsx';
        Excel::store(new ExportStructures, $filename, 'public');
        return response()->json($filename);
    }
}
