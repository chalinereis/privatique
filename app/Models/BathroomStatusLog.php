<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BathroomStatusLog extends Model
{
    use HasFactory;

    // Defina a tabela se o nome não seguir o padrão plural do Laravel
    protected $table = 'bathroom_status_logs';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'bathroom_id',
        'status',
        'timestamp', // Se você estiver usando um campo timestamp manualmente
    ];

    // Relação com o modelo Bathroom, caso exista
    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
