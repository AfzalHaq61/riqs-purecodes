<?php

namespace App\Http\Controllers\Structures;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StructuresCreateRequest;
use App\Models\Halqa;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class StructureStoreController extends Controller
{
    public function __invoke(StructuresCreateRequest $request)
    {
        $user = Auth::user();
        try {
            if ($user->hasAnyRole(RolesEnum::REGIONALSADR)) {
                Zone::create([
                    'uuid' => $request->safe()->uuid,
                    'name' => $request->safe()->name,
                    'slug' => Str::slug($request->safe()->name),
                    'region_id' => $user->resource->region_id,
                    'province_id' => $user->resource->region->province_id,
                ]);
            } else if ($user->hasAnyRole(RolesEnum::ZONALSADR)) {
                Halqa::create([
                    'uuid' => $request->safe()->uuid,
                    'name' => $request->safe()->name,
                    'slug' => Str::slug($request->safe()->name),
                    'zone_id' => $user->resource->zone_id,
                    'shehar_id' => $user->resource->shehar_id,
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('structures.index')
            ->with('success', "Structure Resource Successfully created.");
    }
}
