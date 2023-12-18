<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaliyatPopupCreateRequest;
use App\Models\Resource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MaliyatPopupController extends Controller
{
    public function edit(Resource $resource)
    {
        return Inertia::render('MaliyatPopup', [
            'resource' => $resource,
        ]);
    }

    public function update(Resource $resource, MaliyatPopupCreateRequest $request)
    {
        $resource->maliyat = $request->maliyat;

        $resource->save();

        return Redirect::route('kawaif.index')
            ->with('success', "Maliyat Successfully updated.");
    }
}
