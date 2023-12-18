<?php

namespace App\Http\Controllers\Structures;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class StructureCreateController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Structures/StructureCreate')
            ->with('success_message', "Yay it worked");
    }
}
