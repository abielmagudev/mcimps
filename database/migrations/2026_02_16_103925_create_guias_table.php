<?php

use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('numero_rastreo_origen')->nullable();
            $table->string('numero_rastreo_usa')->nullable();
            $table->string('numero_rastreo_mex')->nullable();
            $table->string('registro_salida')->nullable();
            $table->timestamp('fecha_salida')->nullable();
            $table->unsignedBigInteger('salida_por_usuario')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('status')->default(GuiaStatusEnum::DEFAULT);
            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->unsignedBigInteger('transportadora_id')->nullable();
            $table->unsignedBigInteger('creado_por_usuario');
            $table->unsignedBigInteger('actualizado_por_usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guias');
    }
};
