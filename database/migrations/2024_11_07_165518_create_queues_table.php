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
        Schema::create('queues', function (Blueprint $table) {
            $table->id(); // ID da fila
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID do usuário que está na fila
            $table->foreignId('bathroom_id')->constrained()->onDelete('cascade'); // ID do banheiro relacionado
            $table->integer('position'); // Posição do usuário na fila
            $table->integer('estimated_wait_time'); // Tempo estimado de espera
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
