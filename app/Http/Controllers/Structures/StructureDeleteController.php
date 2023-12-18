<?php

namespace App\Http\Controllers\Structures;

use App\Http\Controllers\Controller;
use App\Models\Zone;

class StructureDeleteController extends Controller
{
    public function __invoke(Zone $zone)
    {
        $zone->delete();

        return Redirect()
            ->back()
            ->with('success', "Zone Successfully deleted.");
    }
}
