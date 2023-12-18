<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Resource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function create(Resource $resource)
    {
        return Inertia::render('CreateAccountPopup', [
            'resource' => $resource,
            'roles' => Role::all()
            ->map(fn ($role) => [
                'id' => $role->id,
                'name' => $role->name
            ]),
        ])->with('success_message', "Yay it worked");
    }

    public function store(Resource $resource, UserCreateRequest $request,)
    {
        $data = $request->validated();

        try {
            $user = User::create([
                'name' => $resource['first_name'],
                'email' => $data['email'],
                'password' => Hash  ::make($data['password']),
            ]);
            $resource->user_id = $user->id;
            $resource->save();

            $user->assignRole($data['roles']);
                
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('kawaif.index')
            ->with('success', "User Successfully created.");;
    }
}
