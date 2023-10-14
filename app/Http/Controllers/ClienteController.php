<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clienti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input

        $request->validate([
            'tipo' => ['required', Rule::in(['azienda', 'persona'])],
            'ragione_sociale' => [
                'required_if:tipo,azienda', // this makes it required if the type is azienda
                'string',
                'max:100',
            ], 
            'nome' => [
                'required_if:tipo,persona', // this makes it required if the type is azienda
                'string',
                'max:50',
            ],
            'cognome' => [
                'required_if:tipo,persona', // this makes it required if the type is azienda
                'string',
                'max:50',
            ]

        ]);
        dd($request->all()); // To check the submitted data

        //create a new Cliente into the database
        Cliente::create($request->all());  

        //redirect the user and send success message
        return redirect()->route('admin.clienti.index')->with('success', 'Cliente aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
