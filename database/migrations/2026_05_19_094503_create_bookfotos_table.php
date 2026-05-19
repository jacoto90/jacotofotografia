<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookfotos', function (Blueprint $table) {
            $table->id('idbookfotos');
            $table->string('nombrebook', 80);
            $table->unsignedBigInteger('idcliente');
            $table->string('pwd', 15);
            $table->timestamps();

            $table->foreign('idcliente')->references('idcliente')->on('clientes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookfotos');
    }
};
