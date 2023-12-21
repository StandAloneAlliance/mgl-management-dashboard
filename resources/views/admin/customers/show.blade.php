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
                                <header>
                                    <h2>{{ $course->nome_corso}} aut. {{ $course->numero_autorizzazione }}</h2>
                                </header>
                            </div>
                            <div class="back">
                                <ul class="list-unstyled">
                                    <li>
                                        <strong>{{ $course->genere_corso }}</strong>
                                    </li>
                                    <li>Aut. {{ $course->numero_autorizzazione }}</li>
                                    <li>N° partecipanti: <strong>{{ $course->posti_disponibili }}</strong></li>
                                    <li>Città: {{ $course->cap_sede_corso }}, {{ $course->città_di_svolgimento }} ({{ $course->provincia }})</li>
                                    <li>Sede: {{ $course->indirizzo_di_svolgimento }}</li>
                                    <li>Direttore: <strong>{{ $course->direttore_corso }}</strong></li>
                                    <li>Docente: <strong>{{ $course->docenti_corso }}</strong></li>
                                    <li>Data Inizio: {{ $formatted_start_date }}</li>
                                    <li>Data Termine: {{ $formatted_end_date }}</li>
                                    <li>Durata: {{ $course->durata_corso }} ore</li>
                                    <li>Validità: {{ $course->validità }} anni</li> 
                                    <li>Data di scadenza: {{ $formatted_expiry_date }}</li>
                                    @if ($course->status === 'Scaduto')
                                        <li>Stato: <strong style="color: rgb(237, 31, 31)">{{ $course->status }}</strong></li>          
                                    @elseif($course->status === 'In Scadenza')
                                        <li>Stato: <strong style="color: rgb(237, 107, 31)">{{ $course->status }}</strong></li>
                                    @else
                                        <li>Stato: <strong>{{ $course->status }}</strong></li>
                                    @endif
                                </ul>
                                <a href="{{ route('admin.courses.edit', ['customer_id' => $customer->id, 'course_id' => $course->id])}}">Modifica il corso</a>
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