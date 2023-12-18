<?php

namespace App\Http\Controllers\Structures;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Models\Halqa;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StructureEditController extends Controller
{
    public function __invoke($resource)
    {
        $user = Auth::user();

        if ($user->hasAnyRole(RolesEnum::REGIONALSADR)) {
            $resource = Zone::where('uuid', $resource)->first();
        } else if ($user->hasAnyRole(RolesEnum::ZONALSADR)) {
            $resource = Halqa::where('uuid', $resource)->first();
        }

        return Inertia::render('Structures/StructureEdit', [
            'resource' => $resource,
        ])->with('success_message', "Yay it worked");
    }
}
