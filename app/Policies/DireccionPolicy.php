<?php

namespace App\Policies;

use App\Models\Direccion;
use App\Models\User;
use App\Models\User\UserTypeEnum;
use Illuminate\Auth\Access\Response;

class DireccionPolicy
{
    private function basicPermission(User $user): bool
    {
        return $user->type == UserTypeEnum::DOCUMENTADOR->value;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->basicPermission($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Direccion $direccion): bool
    {
        return $this->basicPermission($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->basicPermission($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Direccion $direccion): bool
    {
        return $this->basicPermission($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Direccion $direccion): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Direccion $direccion): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Direccion $direccion): bool
    {
        return false;
    }
}
