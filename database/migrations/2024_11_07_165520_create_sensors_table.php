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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bathroom_id')->constrained()->onDelete('cascade'); // Relaciona com a tabela bathrooms
            $table->string('type'); // Tipo do sensor (por exemplo, 'motion', 'magnetic')
            $table->string('status'); // Status atual do sensor (por exemplo, 'active', 'inactive')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
