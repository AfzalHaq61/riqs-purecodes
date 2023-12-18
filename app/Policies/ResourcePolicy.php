<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->hasAnyRole(
            [
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI,
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI,
                RolesEnum::ZONALNAZIMEMALIYAT,
                RolesEnum::ZONALNAZIMERAHIMIA,
                RolesEnum::ZONALNAZIMENASHRIYAT,
                RolesEnum::SADREHALQA,
                RolesEnum::NAZIMUMOOMIHALQA
            ]
        )) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->hasAnyRole(
            [
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI,
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI,
                RolesEnum::SADREHALQA,
                RolesEnum::NAZIMUMOOMIHALQA
            ]
        )) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        if ($user->hasAnyRole(
            [
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI,
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI,
                RolesEnum::ZONALNAZIMEMALIYAT,
                RolesEnum::SADREHALQA,
                RolesEnum::NAZIMUMOOMIHALQA
            ]
        )) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        if ($user->hasAnyRole(
            [
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI,
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI,
                RolesEnum::ZONALNAZIMEMALIYAT,
                RolesEnum::ZONALNAZIMERAHIMIA,
                RolesEnum::ZONALNAZIMENASHRIYAT,
                RolesEnum::SADREHALQA,
                RolesEnum::NAZIMUMOOMIHALQA
            ]
        )) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Resource $resource)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Resource $resource)
    {
        //
    }
}
