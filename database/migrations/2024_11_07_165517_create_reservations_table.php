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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // referência ao usuário
            $table->foreignId('bathroom_id')->constrained()->onDelete('cascade'); // referência ao banheiro
            $table->timestamp('start_time'); // hora de início
            $table->timestamp('end_time'); // hora de término
            $table->boolean('is_extended')->default(false); // se a reserva foi estendida
            $table->string('status'); // status da reserva
            $table->timestamps(); // timestamps para created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
