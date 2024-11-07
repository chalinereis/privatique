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
        Schema::create('bathroom_status_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bathroom_id')->constrained()->onDelete('cascade'); // Referência ao banheiro
            $table->string('status'); // Ex: 'available', 'occupied', 'maintenance'
            $table->timestamps(); // Cria created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bathroom_status_logs');
    }
};
