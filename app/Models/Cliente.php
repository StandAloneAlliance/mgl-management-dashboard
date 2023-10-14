<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'cognome',
        'ragione_sociale',
        'tipo_cliente'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'clienti_courses', 'cliente_id', 'course_id');
    }
    
}
