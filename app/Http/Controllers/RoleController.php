<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Models\Resource;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function store(RoleCreateRequest $request, Resource $resource)
    {
        $data = $request->validated();
        $roleName = Role::get()->where('id', $data['role_id']);

        // ->assignRole($roleName);

        // try {
        //     Role::create([
        //         'role_id' => $data['role_id'],
        //         'model_type' => $data['model_type'],
        //         'model_id' => $data['model_id'],
        //     ]);
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }

        return Redirect::route('kawaif.index')
            ->with('success', "Role Successfully created.");;
    }

}
