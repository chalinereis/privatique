<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    // Defina os campos que podem ser atribuídos em massa
    protected $fillable = [
        'bathroom_id',
        'type',
        'status',
        'last_triggered',
    ];

    // Defina a relação com o modelo Bathroom
    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
