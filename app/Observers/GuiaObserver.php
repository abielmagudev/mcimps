<?php

namespace App\Observers;

use App\Models\Guia;

class GuiaObserver
{
    public function creating(Guia $guia): void
    {
        $guia->creado_por_usuario = mt_rand(1,10);
        $guia->actualizado_por_usuario = mt_rand(1,10);
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
        $guia->actualizado_por_usuario = mt_rand(1,10);
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
