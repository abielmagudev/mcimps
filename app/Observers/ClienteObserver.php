<?php

namespace App\Observers;

use App\Models\Cliente;

class ClienteObserver
{
    public function creating(Cliente $cliente): void
    {
        $cliente->creado_por_usuario = mt_rand(1,11);
        $cliente->actualizado_por_usuario = mt_rand(1,11);
    }

    /**
     * Handle the Cliente "created" event.
     */
    public function created(Cliente $cliente): void
    {
        //
    }

    public function updating(Cliente $cliente): void
    {
        $cliente->actualizado_por_usuario = mt_rand(1,11);
    }
    
    /**
     * Handle the Cliente "updated" event.
     */
    public function updated(Cliente $cliente): void
    {
        //
    }

    public function deleting(Cliente $cliente): void
    {
        $cliente->eliminado_por_usuario = mt_rand(1,11);
    }
    
    /**
     * Handle the Cliente "deleted" event.
     */
    public function deleted(Cliente $cliente): void
    {
        //
    }

    /**
     * Handle the Cliente "restored" event.
     */
    public function restored(Cliente $cliente): void
    {
        //
    }

    /**
     * Handle the Cliente "force deleted" event.
     */
    public function forceDeleted(Cliente $cliente): void
    {
        //
    }
}
