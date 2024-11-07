<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminReport extends Model
{
    // Usado para permitir atribuição em massa
    protected $fillable = [
        'report_type',
        'bathroom_id', // Se você tiver uma relação com a tabela bathrooms
        'generated_at', // Ou qualquer outro campo que você tenha na sua tabela
    ];

    // Defina relacionamentos, se necessário
    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
