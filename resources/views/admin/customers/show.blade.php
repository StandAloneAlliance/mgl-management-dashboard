@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
        <div class="row">
            @if (session('error'))
            <!-- Operation not Authorized Message -->
                <div class="col-12 col-lg-6 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            @if (session('message'))
            <!-- Confirm Message -->
                <div class="col-12 col-lg-6 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12 mt-5 body">
                @if (count($courses) > 0)

                <div class="cards">
                    @foreach ($courses as $course)
                    <label id="summary">
                        <input id="check" type="checkbox" />
                        <article>
                            <div class="front">
                                @if($course->status == 'scaduto')
                                <var style="color: '#ef4444'">{{ $course->status }}</var>
                                @endif
                                <var style="color: '#3b82f6'">{{ $course->status }}</var>
                                <header>
                                    <h2>{{ $course->nome_corso}} aut. {{ $course->numero_autorizzazione }}</h2>
                                </header>
                            </div>
                            <div class="back">
                                <ul>
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
                                </ul>
                                <p>More Information</p>
                            </div>
                        </article>
                    </label>
                    @endforeach
                </div>
                @else
                    <h3>Nessun corso associato</h3>
                @endif
            </div>
        </div>
    </div>
@endsection