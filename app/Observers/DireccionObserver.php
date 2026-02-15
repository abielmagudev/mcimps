<?php

namespace App\Observers;

use App\Models\Direccion;

class DireccionObserver
{
    /**
     * Handle the Direccion "created" event.
     */
    public function created(Direccion $direccion): void
    {
        //
    }

    /**
     * Handle the Direccion "updated" event.
     */
    public function updated(Direccion $direccion): void
    {
        //
    }

    /**
     * Handle the Direccion "deleted" event.
     */
    public function deleted(Direccion $direccion): void
    {
        //
    }

    /**
     * Handle the Direccion "restored" event.
     */
    public function restored(Direccion $direccion): void
    {
        //
    }

    /**
     * Handle the Direccion "force deleted" event.
     */
    public function forceDeleted(Direccion $direccion): void
    {
        //
    }
}
