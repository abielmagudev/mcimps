<?php

namespace App\Observers;

use App\Models\Direccion;

class DireccionObserver
{
    public function creating(Direccion $direccion): void
    {
        $direccion->creado_por_usuario = mt_rand(1,11);
        $direccion->actualizado_por_usuario = mt_rand(1,11);
    }

    /**
     * Handle the Direccion "created" event.
     */
    public function created(Direccion $direccion): void
    {
        //
    }

    public function updating(Direccion $direccion): void
    {
        $direccion->actualizado_por_usuario = mt_rand(1,11);
    }

    /**
     * Handle the Direccion "updated" event.
     */
    public function updated(Direccion $direccion): void
    {
        //
    }

    public function deleting(Direccion $direccion): void
    {
        $direccion->eliminado_por_usuario = mt_rand(1,11);
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
