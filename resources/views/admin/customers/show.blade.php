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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Dettagli dei corsi di {{ $customer->name}} {{ $customer->surname }}</h3>
                    </div>

                    <div class="card-body">
                        @if (count($courses) > 0)
                            {{-- mettere qui il foreach de corsi --}}
                            @foreach ($courses as $course)
                                <ul>
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
                                </ul>
                                <a href="{{ route('admin.courses.edit', ['customer_id' => $customer->id, 'course_id' => $course->id])}}" class="btn btn-success">Modifica il corso</a>
                            @endforeach
                        @else
                            <h3>Nessun corso associato</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection