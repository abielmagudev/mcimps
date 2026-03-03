<?php

namespace App\Observers;

use App\Models\Guia;
use Illuminate\Support\Facades\Auth;

class GuiaObserver
{
    public function creating(Guia $guia): void
    {
        $guia->creado_por_usuario = Auth::id();
        $guia->actualizado_por_usuario = Auth::id();
    }

    /**
     * Handle the Guia "created" event.
     */
    public function created(Guia $guia): void
    {
        //
    }

    public function updating(Guia $guia): void
    {
        $guia->actualizado_por_usuario = Auth::id();
    }

    /**
     * Handle the Guia "updated" event.
     */
    public function updated(Guia $guia): void
    {
        //
    }

    /**
     * Handle the Guia "deleted" event.
     */
    public function deleted(Guia $guia): void
    {
        //
    }

    /**
     * Handle the Guia "restored" event.
     */
    public function restored(Guia $guia): void
    {
        //
    }

    /**
     * Handle the Guia "force deleted" event.
     */
    public function forceDeleted(Guia $guia): void
    {
        //
    }
}
