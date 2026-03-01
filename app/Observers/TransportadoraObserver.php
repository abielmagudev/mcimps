<?php

namespace App\Observers;

use App\Models\Transportadora;

class TransportadoraObserver
{
    public function creating(Transportadora $transportadora): void
    {
        $transportadora->creado_por_usuario = mt_rand(1,11);
        $transportadora->actualizado_por_usuario = mt_rand(1,11);
    }

    /**
     * Handle the Transportadora "created" event.
     */
    public function created(Transportadora $transportadora): void
    {
        //
    }

    public function updating(Transportadora $transportadora): void
    {
        $transportadora->actualizado_por_usuario = mt_rand(1,11);
    }
    
    /**
     * Handle the Transportadora "updated" event.
     */
    public function updated(Transportadora $transportadora): void
    {
        //
    }

    public function deleting(Transportadora $transportadora): void
    {
        $transportadora->eliminado_por_usuario = mt_rand(1,11);
    }
    
    /**
     * Handle the Transportadora "deleted" event.
     */
    public function deleted(Transportadora $transportadora): void
    {
        //
    }

    /**
     * Handle the Transportadora "restored" event.
     */
    public function restored(Transportadora $transportadora): void
    {
        //
    }

    /**
     * Handle the Transportadora "force deleted" event.
     */
    public function forceDeleted(Transportadora $transportadora): void
    {
        //
    }
}
