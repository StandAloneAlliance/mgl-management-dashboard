@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
<div class="container">
    <div class="row d-flex justify-content-center">
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
            <div class="card my-3">
                <div class="card-body">
                    <form action="{{ route('admin.store_courses.assign',  ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data" id="createRestaurantForm" class="card shadow bg-body-tertiary p-2">
                        @csrf
                        <!-- Card Header -->
                        <div class="card-header bg-white py-3">
                            <!-- Create Title -->
                            <h1 class="text-center">Assegna corso a {{ $customer->name }} {{ $customer->surname}}</h1>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Customer Name Form Group -->
                            <div class="form-group my-4 d-flex flex-column">
                                <!-- Name Label -->
                                <label class="control-label my-2">Seleziona il corso *</label>
                                <!-- Name Input Text -->
                                <select class="form-select form-select-lg" name="nome_corso" class="w-100" required>
                                    @foreach ($courses as $course)
                                        <option class="option-size">{{ $course }}</option>
                                    @endforeach
                                </select>
                                <!-- Name Error Text -->
                                @error('nome_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Indirizzo di svolgimento -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Indirizzo di svolgimento *</label>
                                <input type="text" name="indirizzo_di_svolgimento" id="indirizzo_di_svolgimento" placeholder="Inserisci l'indirizzo di svolgimento del corso" class="form-control @error('indirizzo_di_svolgimento') is-invalid @enderror" value="{{ old('indirizzo_di_svolgimento') }}" required maxlength="40">
                                @error('indirizzo_di_svolgimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Città di svolgimento -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Città di svolgimento *</label>
                                <input type="text" name="città_di_svolgimento" id="città_di_svolgimento" placeholder="Inserisci la città di svolgimento del corso" class="form-control @error('città_di_svolgimento') is-invalid @enderror" value="{{ old('città_di_svolgimento') }}" required maxlength="25">
                                @error('città_di_svolgimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>                           
                            <!-- CAP -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">CAP *</label>
                                <input type="text" name="cap_sede_corso" id="cap_sede_corso" placeholder="Inserisci il CAP della sede del corso" class="form-control @error('cap_sede_corso') is-invalid @enderror" value="{{ old('cap_sede_corso') }}" required pattern="[0-9]+" maxlength="5">
                                @error('cap_sede_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Provincia -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Provincia *</label>
                                <input type="text" name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{ old('provincia')}}" placeholder="Inserisci la provincia della sede del corso" required maxlength="2">
                                @error('provincia')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>                                                                                               
                            <!-- Direttore corso -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Direttore corso *</label>
                                <input type="text" name="direttore_corso" id="direttore_corso" placeholder="Inserisci il direttore del corso" class="form-control @error('direttore_corso') is-invalid @enderror" value="{{ old('direttore_corso') }}" required maxlength="35">
                                @error('direttore_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Docente corso -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Docente corso *</label>
                                <input type="text" name="docenti_corso" id="docenti_corso" placeholder="Inserisci il docente" class="form-control @error('docenti_corso') is-invalid @enderror" value="{{ old('docenti_corso') }}" required maxlength="35">
                                @error('docenti_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <label class="control-label my-2">Inizio corso *</label>
                                <input type="date" name="inizio_di_svolgimento" id="inizio_di_svolgimento" class="form-control @error('inizio_di_svolgimento') is-invalid @enderror" required>
                                @error('inizio_di_svolgimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>                       
                            <!-- Fine corso -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Fine corso *</label>
                                <input type="date" name="fine_svolgimento" id="fine_svolgimento" class="form-control @error('fine_svolgimento') is-invalid @enderror" required>
                                @error('fine_svolgimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Genere corso -->
                            <div class="form-group my-4">
                                <label class="control-label my-2">Genere corso *</label>
                                <select class="form-select" name="genere_corso" id="genere_corso" required>
                                    <option value="" selected>Seleziona un genere</option>
                                    <option value="D.Lgs 81/2008">D.Lgs 81/2008</option>
                                    <option value="Aggiornamento">Aggiornamento</option>
                                    <option value="3">/da mettere un altro genere/</option>
                                    <option value="4">/da mettere un altro genere/</option>
                                </select>
                                @error('genere_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Numero Autorizzazione *</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="numero_autorizzazione" id="numero_autorizzazione" placeholder="Inserisci il numero di autorizzazione del corso" class="form-control @error('numero_autorizzazione') is-invalid @enderror" value="{{ old('numero_autorizzazione') }}" required>
                                <!-- Customer Task Error Text -->
                                @error('numero_autorizzazione')
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
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Durata corso *</label>
                                <!-- Customer Task Input Text -->
                                <input type="number" name="durata_corso" id="durata_corso" placeholder="Inserisci la durata del corso" class="form-control @error('durata_corso') is-invalid @enderror" value="{{ old('durata_corso') }}" required>
                                <!-- Customer Task Error Text -->
                                @error('durata_corso')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <!-- Surname Label -->
                                <label class="control-label my-2">Validità *</label>
                                <!-- Surname Input Text -->
                                <input type="number" name="validità" id="validità" placeholder="Inserisci i posti disponibili" class="form-control @error('validità') is-invalid @enderror" value="{{ old('validità') }}" required>
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