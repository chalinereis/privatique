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
        Schema::create('bathrooms', function (Blueprint $table) {
            $table->id(); // ID único para cada banheiro
            $table->string('location'); // Localização do banheiro
            $table->boolean('is_favorite')->default(false); // Indica se é favorito
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bathrooms');
    }
};
