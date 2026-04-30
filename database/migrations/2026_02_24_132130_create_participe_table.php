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
        Schema::create('participe', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('idPer')->constrained('personne', 'idPer')->onDelete('cascade');
            $table->foreignId('idRolePer')->constrained('role_personne', 'idRolePer')->onDelete('cascade');
            $table->foreignId('idFil')->constrained('film', 'idFil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participe');
    }
};
