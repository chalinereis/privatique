<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bathroom_id',
        'cleanliness_rating',
        'comments',
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
