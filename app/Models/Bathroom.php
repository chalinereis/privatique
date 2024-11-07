<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bathroom extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'location',
        'is_favorite',
        // Adicione outros campos que você deseja que sejam atribuíveis em massa
    ];

    // Se você tiver alguma relação com outros modelos, defina aqui
    // Exemplo: 
    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }
}
