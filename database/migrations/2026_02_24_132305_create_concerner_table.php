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
        Schema::create('concerner', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('nbPer');
            $table->foreignId('idRes')->constrained('reservation','idRes')->onDelete('cascade');
            $table->foreignId('idTar')->constrained('tarif','idTar')->onDelete('cascade');
            $table->foreignId('idSea')->constrained('seance','idSea')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerner');
    }
};
