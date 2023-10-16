<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name'          =>  'required|max:60',
            'surname'       =>  'required|max:60',
            'cfr'           =>  'required|regex:/^\d{16}$/|unique:customers,cfr',
            'email'         =>  'email',
            'cover_image'   =>  'image',
            'date_of_birth' =>  'required|date_format:d/m/Y',
            'city_of_birth' =>  'required|max:60',
            'task'          =>  'max:70',

        ];
    }

    public function messages(){
        return [
            'name.required'             =>  'Il nome è obbligatorio',
            'name.max'                  =>  'Il nome dev\' essere composto da :max caratteri',
            'surname.required'          =>  'Il cognome è obbligatorio',
            'surname.max'               =>  'Il cognome dev\' essere composto da :max caratteri',
            'cfr.required'              =>  'Il Codice Fiscale è obbligatorio',
            'cfr.regex'                 =>  'Il Codice Fiscale deve avere una lunghezza di 16 aratteri',
            'cfr.unique'                =>  'Questa Codice Fiscale è già stato utilizzato',
            'email.email'               =>  'Inserisci un indirizzo email valido',
            'cover_image.image'         =>  'L\' immagine deve essere nel formato: jpg, jpeg, png, webp',
            'date_of_birth.required'    =>  'La data di nascita è obbligatoria',
            'date_of_birth.date_format' =>  'Inserisci una data valida nel formato gg/mm/aaaa',
            'city_of_birth.required'    =>  'La città di nascita è obbligatoria',
            'city_of_birth.max'         =>  'La città di nascita dev\' essere composta da :max caratteri',
            'task.max'                  =>  'La mansione dev\' essere composto da massimo :max caratteri',
        ];
    }
}
