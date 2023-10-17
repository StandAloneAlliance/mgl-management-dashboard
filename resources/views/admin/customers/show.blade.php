@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Dettagli dei corsi di {{ $customer->name}} {{ $customer->surname }}</h3>
                    </div>

                    <div class="card-body">
                        <ul>
                            @if (count($courses) > 0)
                                {{-- mettere qui il foreach de corsi --}}
                                @foreach ($courses as $course)
                                    <li>{{ $course->nome_corso }}</li>
                                    <li>{{ $course->genere_corso }}</li>
                                    <li>{{ $course->numero_autorizzazione }}</li>
                                    <li>N° posti: {{ $course->posti_disponibili }}</li>
                                    <li>CAP: {{ $course->cap_sede_corso }}</li>
                                    <li>Città: {{ $course->città_di_svolgimento }} ({{ $course->provincia }})</li>
                                    <li>Sede: {{ $course->indirizzo_di_svolgimento }}</li>
                                    <li>Direttore: {{ $course->direttore_corso }}</li>
                                    <li>Docente: {{ $course->docenti_corso }}</li>
                                    <li>Data Inizio: {{ $course->inizio_di_svolgimento }}</li>
                                    <li>Data Termine: {{ $course->fine_svolgimento }}</li>
                                    <li>Durata: {{ $course->durata_corso }}</li>
                                    <li>Stato: {{ $course->status }}</li>
                                    <li>Data di scadenza: {{ $course->data_scadenza }}</li>
                                    <li>Validità: {{ $course->validità }} anni</li>
                                @endforeach
                            @else
                                <h3>Nessun corso associato</h3>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection