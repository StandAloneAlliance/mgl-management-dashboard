<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_corso',
        'posti_disponibili',
        'cap_sede_corso',
        'città_di_svolgimento',
        'indirizzo_di_svolgimento',
        'provincia',
        'direttore_corso',
        'docenti_corso',
        'inizio_di_svolgimento',
        'fine_svolgimento',
        'genere_corso',
        'numero_autorizzazione',
        'durata_corso'
    ];
    
}
