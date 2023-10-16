@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Dettagli</h3>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>{{ $courses->nome_corso }}</li>
                            <li>{{ $courses->genere_corso }}</li>
                            <li>{{ $courses->numero_autorizzazione }}</li>
                            <li>N° posti: {{ $courses->posti_disponibili }}</li>
                            <li>CAP: {{ $courses->cap_sede_corso }}</li>
                            <li>Città: {{ $courses->città_di_svolgimento }} ({{ $courses->provincia }})</li>
                            <li>Sede: {{ $courses->indirizzo_di_svolgimento }}</li>
                            <li>Direttore: {{ $courses->direttore_corso }}</li>
                            <li>Docente: {{ $courses->docenti_corso }}</li>
                            <li>Data Inizio: {{ $courses->inizio_di_svolgimento }}</li>
                            <li>Data Termine: {{ $courses->fine_svolgimento }}</li>
                            <li>Durata: {{ $courses->durata_corso }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection