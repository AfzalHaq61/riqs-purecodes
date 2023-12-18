<?php

namespace App\Http\Controllers\Structures;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\StrutureCollection;
use App\Models\Halqa;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StructureIndexController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()->hasAnyRole(RolesEnum::REGIONALSADR)) {
            $query = Zone::query()
                ->when(request('search'), function ($query) {
                    return $query->where('name', 'LIKE', "%" . request('search') . "%");
                })->paginate('50');
            $total_resources = Zone::all()->count();
        } else if (Auth::user()->hasAnyRole(RolesEnum::ZONALSADR)) {
            $query = Halqa::query()
                ->when(request('search'), function ($query) {
                    return $query->where('name', 'LIKE', "%" . request('search') . "%");
                })->paginate('50');
            $total_resources = Halqa::all()->count();
        }
        return Inertia::render('Structures/Structure', [
            'total_resources' => $total_resources,
            'structures_resources' => new StrutureCollection($query),
        ]);
    }
}
