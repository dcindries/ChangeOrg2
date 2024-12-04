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
        Schema::create('peticione_user', function (Blueprint $table) {
            $table->primary(['user_id', 'peticione_id']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('peticione_id')->constrained('peticiones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peticione_user');
    }

};
