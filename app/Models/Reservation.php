<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bathroom_id',
        'start_time',
        'end_time',
        'is_extended',
        'status',
    ];

    // Define a relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relação com o banheiro
    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
