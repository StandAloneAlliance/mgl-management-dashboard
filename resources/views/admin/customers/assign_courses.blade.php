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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store_courses.assign',  ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data" id="createRestaurantForm" class="card shadow bg-body-tertiary p-2">
                        @csrf
                        <!-- Card Header -->
                        <div class="card-header bg-white py-3">
                            <!-- Create Title -->
                            <h1 class="text-center">Assegna corsi al corsista {{ $customer->name }} {{ $customer->surname}}</h1>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Customer Name Form Group -->
                            <div class="form-group my-4 d-flex flex-column">
                                <!-- Name Label -->
                                <label class="control-label my-2">Seleziona il corso *</label>
                                <!-- Name Input Text -->
                                <select name="nome_corso" class="w-100">
                                    @foreach ($courses as $course)
                                        <option class="w-50">{{ $course }}</option>
                                    @endforeach
                                </select>
                                <!-- Name Error Text -->
                                @error('nome_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Surname Form Group -->
                            <div class="form-group my-4">
                                <!-- Surname Label -->
                                <label class="control-label my-2">Posti disponibili *</label>
                                <!-- Surname Input Text -->
                                <input type="number" name="posti_disponibili" id="posti_disponibili" placeholder="Inserisci i posti disponibili" class="form-control @error('posti_disponibili') is-invalid @enderror" value="{{ old('posti_disponibili') }}">
                                <!-- Surname Error Text -->
                                @error('posti_disponibili')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer C.F. Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer C.F. Label -->
                                <label class="control-label my-2">CAP *</label>
                                <!-- Customer C.F. Input Text -->
                                <input type="text" name="cap_sede_corso" id="cap_sede_corso" placeholder="Inserisci il CAP dell sede del corso" class="form-control @error('cap_sede_corso') is-invalid @enderror" value="{{ old('cap_sede_corso') }}">
                                <!-- Customer C.F. Error Text -->
                                @error('cap_sede_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Email Form Group -->
                            <div class="form-group my-4">
                                <!-- Email Label -->
                                <label class="control-label my-2">Città di svolgimento *</label>
                                <!-- Email Input Text -->
                                <input type="text" name="città_di_svolgimento" id="città_di_svolgimento" placeholder="Inserisci la città di svolgimento del corso" class="form-control @error('città_di_svolgimento') is-invalid @enderror" value="{{ old('città_di_svolgimento') }}">
                                <!-- Email Error Text -->
                                @error('città_di_svolgimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer City Of Birth Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer City Of Birth Label -->
                                <label class="control-label my-2">Indirizzo di svolgimento *</label>
                                <!-- Customer City Of Birth Input Text -->
                                <input type="text" name="indirizzo_di_svolgimento" id="indirizzo_di_svolgimento" placeholder="Inserisci l'indirizzo di svolgimento del corso" class="form-control @error('indirizzo_di_svolgimento') is-invalid @enderror" value="{{ old('indirizzo_di_svolgimento') }}">
                                <!-- Customer City Of Birth Error Text -->
                                @error('indirizzo_di_svolgimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Date Of Birth Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer Date Of Birth Label -->
                                <label class="control-label my-2">Provincia *</label>
                                <!-- Customer Date Of Birth Input File -->
                                <input type="text" name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{ old('provincia')}}">
                                <!-- Customer Date Of Birth Error Text -->
                                @error('provincia')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Task Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Direttore corso *</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="direttore_corso" id="direttore_corso" placeholder="Inserisci il direttore del corso" class="form-control @error('direttore_corso') is-invalid @enderror" value="{{ old('direttore_corso') }}">
                                <!-- Customer Task Error Text -->
                                @error('direttore_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Docenti corso *</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="docenti_corso" id="docenti_corso" placeholder="Inserisci il docente" class="form-control @error('docenti_corso') is-invalid @enderror" value="{{ old('docenti_corso') }}">
                                <!-- Customer Task Error Text -->
                                @error('docenti_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Cover Image Form Group -->
                            <div class="form-group my-4">
                                <!-- Cover Image Label -->
                                <label class="control-label my-2">Inizio corso *</label>
                                <!-- Cover Image Input File -->
                                <input type="date" name="inizio_di_svolgimento" id="inizio_di_svolgimento" class="form-control @error('inizio_di_svolgimento') is-invalid @enderror">
                                <!-- Cover Image Error Text -->
                                @error('inizio_di_svolgimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Cover Image Form Group -->
                            <div class="form-group my-4">
                                <!-- Cover Image Label -->
                                <label class="control-label my-2">Fine corso *</label>
                                <!-- Cover Image Input File -->
                                <input type="date" name="fine_svolgimento" id="fine_svolgimento" class="form-control @error('fine_svolgimento') is-invalid @enderror">
                                <!-- Cover Image Error Text -->
                                @error('fine_svolgimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Genere corso *</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="genere_corso" id="genere_corso" placeholder="Inserisci il genere corso" class="form-control @error('genere_corso') is-invalid @enderror" value="{{ old('genere_corso') }}">
                                <!-- Customer Task Error Text -->
                                @error('genere_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Numero Autorizzazione *</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="numero_autorizzazione" id="numero_autorizzazione" placeholder="Inserisci il numero di autorizzazione del corso" class="form-control @error('numero_autorizzazione') is-invalid @enderror" value="{{ old('numero_autorizzazione') }}">
                                <!-- Customer Task Error Text -->
                                @error('numero_autorizzazione')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Durata corso *</label>
                                <!-- Customer Task Input Text -->
                                <input type="number" name="durata_corso" id="durata_corso" placeholder="Inserisci la durata del corso" class="form-control @error('durata_corso') is-invalid @enderror" value="{{ old('durata_corso') }}">
                                <!-- Customer Task Error Text -->
                                @error('durata_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Surname Label -->
                                <label class="control-label my-2">Validità *</label>
                                <!-- Surname Input Text -->
                                <input type="number" name="validità" id="validità" placeholder="Inserisci i posti disponibili" class="form-control @error('validità') is-invalid @enderror" value="{{ old('validità') }}">
                                <!-- Surname Error Text -->
                                @error('validità')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Create Submit Button -->
                            <div class="col-12 d-flex justify-content-center align-items-center my-5">
                                <button type="submit" class="btn btn-success fw-bold px-5">CREA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection