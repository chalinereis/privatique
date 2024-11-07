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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relaciona o feedback ao usuário
            $table->foreignId('bathroom_id')->constrained()->onDelete('cascade'); // Relaciona o feedback ao banheiro
            $table->integer('cleanliness_rating')->comment('1 to 5'); // Avaliação de limpeza
            $table->text('comments')->nullable(); // Comentários adicionais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
