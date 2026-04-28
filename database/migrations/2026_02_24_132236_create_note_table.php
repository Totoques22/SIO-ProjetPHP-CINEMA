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
        Schema::create('note', function (Blueprint $table) {
            $table->id('idNote');
            $table->boolean('notFil');
            $table->foreignId('idFil')->constrained('films','idFil');
            $table->foreignId('user_id')->constrained('users','id');
            $table->timestamps();
            $table->unique(['idFil', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note');
    }
};
