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
        Schema::create('admin_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_type'); // Tipo de relatório (diário, semanal, etc.)
            $table->foreignId('bathroom_id')->nullable()->constrained()->onDelete('cascade'); // Referência ao banheiro, se necessário
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_reports');
    }
};
