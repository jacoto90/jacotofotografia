<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40);
            $table->string('apellido', 60);
            $table->string('email', 80);
            $table->text('mensaje');
            $table->string('mobil', 12);
            $table->boolean('gestionado')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};
