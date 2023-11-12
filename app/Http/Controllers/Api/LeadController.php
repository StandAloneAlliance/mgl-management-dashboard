<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailForUsers;
use App\Models\Customer;
use App\Models\User;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $form_data = $request->all();

        // VALIDIAMO I DATI
        $validator = Validator::make($form_data,

            // PARAMETRI DI VALIDAZIONE
            [
                'name'          =>  'required|max:50',
                'surname'       =>  'required|max:50',
                'email'         =>  'required|email',
                'description'   =>  'required'
            ],

            // MESSAGGI DI ERRORE
            [
                'name.required'         => 'Il nome è obbligatorio',
                'name.max'              => 'Il nome deve avere una lunghezza massima di :max caratteri',

                'surname.required'      => 'Il cognome è obbligatorio',
                'surname.max'           => 'Il cognome deve avere una lunghezza massima di :max caratteri',

                'email.required'        => 'L\'email è obbligatoria',
                'email.email'           => 'Devi inserire un\'email valida',

                'description.required'  =>  'La descrizione è obbligatoria'
            ]
        );

        // VERIFICO SE LA RICHIESTA NON VA A BUON FINE
        if($validator->fails()){

            return response()->json([
                'success' => false,
                'errors' =>  $validator->errors()
            ]);
            
        };


        //SALVO I DATI NEL DATABASE
        $new_lead = new Lead();

        $new_lead->fill($form_data);

        $new_lead->save();

        $newLeadEmail = $new_lead->email;

        Mail::to($newLeadEmail)->send(new MailForUsers($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
