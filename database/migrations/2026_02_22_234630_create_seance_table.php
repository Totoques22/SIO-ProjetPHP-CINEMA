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
        Schema::create('seance', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idSea');
            $table->dateTime('dateHeurSea');
            $table->foreignId('idFil')->constrained('film','idFil')->onDelete('cascade');
            $table->foreignId('idSal')->constrained('salle','idSal')->onDelete('cascade');
            $table->foreignId('idTypeSea')->constrained('type_seance','idTypeSea')->onDelete('cascade');
            $table->foreignId('idLangue')->nullable()->constrained('langue', 'idLangue')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seance');
    }
};
