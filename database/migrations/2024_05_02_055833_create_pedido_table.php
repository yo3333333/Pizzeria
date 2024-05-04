<?php

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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->float('total', 10, 2)->default(0);
            $table->unsignedBigInteger("idEmpleado");
            $table->unsignedBigInteger("idPizza");
            $table->foreign('idPizza')->references('id')->on('Pizza')->onDelete('cascade');
            $table->foreign('idEmpleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
