<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome_corso'                =>  'required',
            'posti_disponibili'         =>  'required|numeric',
            'indirizzo_di_svolgimento'  =>  'required|max:40',
            'cap_sede_corso'            =>  'required|digits_between:1,5',
            'città_di_svolgimento'      =>  'required|string|max:25',
            'provincia'                 =>  'required|string|size:2',
            'direttore_corso'           =>  'required|string|max:35',
            'docenti_corso'             =>  'required|string|max:35',
            'inizio_di_svolgimento'     =>  'required',
            'fine_svolgimento'          =>  'required|after_or_equal:inizio_di_svolgimento',
            'genere_corso'              =>  'required|string|max:25',
            'numero_autorizzazione'     =>  'required|string',
            'durata_corso'              =>  'required|integer|min:1',
            'validità'                  =>  'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'nome_corso.required'               => 'Il nome del corso è obbligatorio.',
            'posti_disponibili.required'        => 'Il numero di posti disponibili è obbligatorio.',
            'posti_disponibili.integer'         => 'Il numero di posti disponibili deve essere un numero intero.',
            'posti_disponibili.min'             => 'Il numero di posti disponibili deve essere almeno :min.',
            'indirizzo_di_svolgimento.required' => 'L\'indirizzo di svolgimento è obbligatorio.',
            'indirizzo_di_svolgimento.max'      => 'L\'indirizzo di svolgimento non può superare :max caratteri.',
            'cap_sede_corso.required'           => 'Il CAP della sede del corso è obbligatorio.',
            'cap_sede_corso.numeric'            => 'Il CAP deve essere un numero.',
            'cap_sede_corso.digits_between'     => 'Il CAP deve essere composto da massimo :max cifre.',
            'città_di_svolgimento.required'     => 'La città di svolgimento è obbligatoria.',
            'città_di_svolgimento.max'          => 'La città di svolgimento non può superare :max caratteri.',
            'provincia.required'                => 'La provincia è obbligatoria.',
            'provincia.size'                    => 'La provincia deve essere composta da :size caratteri.',
            'direttore_corso.required'          => 'Il direttore del corso è obbligatorio.',
            'direttore_corso.max'               => 'Il nome del direttore del corso non può superare :max caratteri.',
            'docenti_corso.required'            => 'Il nome del docente del corso è obbligatorio.',
            'docenti_corso.max'                 => 'Il nome del docente del corso non può superare :max caratteri.',
            'inizio_di_svolgimento.required'    => 'La data di inizio del corso è obbligatoria.',
            'fine_svolgimento.required'         => 'La data di fine del corso è obbligatoria.',
            'fine_svolgimento.after_or_equal'   => 'La data di fine del corso deve essere successiva o uguale alla data di inizio del corso.',
            'genere_corso.required'             => 'Il genere del corso è obbligatorio.',
            'genere_corso.max'                  => 'Il genere del corso non può superare :max caratteri.',
            'numero_autorizzazione.required'    => 'Il numero di autorizzazione è obbligatorio.',
            'durata_corso.required'             => 'La durata del corso è obbligatoria.',
            'durata_corso.integer'              => 'La durata del corso deve essere un numero intero.',
            'durata_corso.min'                  => 'La durata del corso deve essere almeno :min.',
            'validità.required'                 => 'La validità del corso è obbligatoria.',
            'validità.integer'                  => 'La validità del corso deve essere un numero intero.',
            'validità.min'                      => 'La validità del corso deve essere almeno :min.'
        ];
    }
}
