<?php

namespace App\Http\Controllers\Structures;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StructuresCreateRequest;
use App\Models\Halqa;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StructureUpdateController extends Controller
{
    public function __invoke($resource, StructuresCreateRequest $request)
    {
        $user = Auth::user();

        if ($user->hasAnyRole(RolesEnum::REGIONALSADR)) {
            Zone::where('uuid', $resource)->update($request->validated());
        } else if ($user->hasAnyRole(RolesEnum::ZONALSADR)) {
            Halqa::where('uuid', $resource)->update($request->validated());
        }

        return Redirect::route('structures.index')
            ->with('success', "Structure Resource Successfully updated.");
    }
}
