<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bathroom_id',
        'position',
        'estimated_wait_time',
        // Adicione outros campos conforme necessário
    ];

    // Definir relações, se necessário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
