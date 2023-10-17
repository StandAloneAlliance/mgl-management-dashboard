<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

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
        'durata_corso',
        'status',
        'data_scadenza',
        'validità'
    ];

    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
}
