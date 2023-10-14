@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Corsi richiesti</h3>
                    <a href="{{ route('admin.courses.create')}}" class="btn btn-primary">Aggiungi corso</a>
                </div>
                <div class="card-body">
                    <div class="list-table table dataTable">
                        <thead>
                            <tr>
                                <th>Corso Aula</th>
                                <th>Autorizzazione</th>
                                <th>Categoria</th>
                                <th>Indirizzo Sede</th>
                                <th>Data Inizio</th>
                                <th>Data Fine</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->nome_corso }}</td>
                                    <td>{{ $course->numero_autorizzazione }}</td>
                                    <td>{{ $course->genere_corso }}</td>
                                    <td>{{ $course->indirizzo_di_svolgimento }}</td>
                                    <td>{{ $course->inizio_di_svolgimento }}</td>
                                    <td>{{ $course->fine_svolgimento }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Azioni
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{ route('admin.courses.show', $course->id)}}">Visualizza</a></li>
                                              <li><a class="dropdown-item" href="#">Annulla</a></li>
                                              <li><a class="dropdown-item" href="#">Richiedi modifica</a></li>
                                              <li><a class="dropdown-item" href="#">Richiedi rilascio attestati</a></li>
                                              <li><a class="dropdown-item" href="#">Lettera di autorizzazione</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
