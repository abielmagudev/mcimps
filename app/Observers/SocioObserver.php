<?php

namespace App\Observers;

use App\Models\Socio;
use Illuminate\Support\Facades\Auth;

class SocioObserver
{
    public function creating(Socio $socio): void
    {
        $socio->creado_por_usuario = Auth::id();
        $socio->actualizado_por_usuario = Auth::id();
    }

    /**
     * Handle the Socio "created" event.
     */
    public function created(Socio $socio): void
    {
        //
    }

    public function updating(Socio $socio): void
    {
        $socio->actualizado_por_usuario = Auth::id();
    }
    
    /**
     * Handle the Socio "updated" event.
     */
    public function updated(Socio $socio): void
    {
        //
    }

    public function deleting(Socio $socio): void
    {
        $socio->eliminado_por_usuario = Auth::id();
    }
    
    /**
     * Handle the Socio "deleted" event.
     */
    public function deleted(Socio $socio): void
    {
        //
    }

    /**
     * Handle the Socio "restored" event.
     */
    public function restored(Socio $socio): void
    {
        //
    }

    /**
     * Handle the Socio "force deleted" event.
     */
    public function forceDeleted(Socio $socio): void
    {
        //
    }
}
