<?php

namespace App\Http\Middleware;

use App\Enums\RolesEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    public function share(Request $request)
    {
        $user = Auth::User();
        if($user) {
            if ($user->hasAnyRole(RolesEnum::REGIONALSADR)) {
                $name = 'Zone';
            } else if ($user->hasAnyRole(RolesEnum::ZONALSADR)) {
                $name = 'Halqa';
            }
        }
        else {
            $name = "";
        }
        
        return array_merge(parent::share($request), [
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ?: null,
                ];
            },
            'user' => $name,
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
            ],
        ]);
    }
}
