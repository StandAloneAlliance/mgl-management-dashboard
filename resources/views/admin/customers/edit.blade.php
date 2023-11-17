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
                    <form action="{{ route('admin.customers.update', $customer) }}" method="POST" enctype="multipart/form-data" id="createRestaurantForm" class="card shadow bg-body-tertiary p-2">
                        @csrf
                        @method('PUT')
                        <!-- Card Header -->
                        <div class="card-header bg-white py-3">
                            <!-- Create Title -->
                            <h1 class="text-center">Modifica i dati del corsista {{ $customer->name }} {{ $customer->surname }}</h1>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Customer Name Form Group -->
                            <div class="form-group my-4">
                                <!-- Name Label -->
                                <label class="control-label my-2">Nome *</label>
                                <!-- Name Input Text -->
                                <input type="text" name="name" id="name" placeholder="Inserisci il nome del corsista" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $customer->name }}" maxlength="60" required>
                                <!-- Name Error Text -->
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Surname Form Group -->
                            <div class="form-group my-4">
                                <!-- Surname Label -->
                                <label class="control-label my-2">Cognome *</label>
                                <!-- Surname Input Text -->
                                <input type="text" name="surname" id="surname" placeholder="Inserisci il cognome del corsista" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') ?? $customer->surname }}" maxlength="60" required>
                                <!-- Surname Error Text -->
                                @error('surname')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer C.F. Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer C.F. Label -->
                                <label class="control-label my-2">Codice Fiscale *</label>
                                <!-- Customer C.F. Input Text -->
                                <input type="text" name="cfr" id="cfr" placeholder="Inserisci il codice fiscale del corsista" class="form-control @error('cfr') is-invalid @enderror" value="{{ old('cfr') ?? $customer->cfr }}" minlength="16" maxlength="16" required>
                                <!-- Customer C.F. Error Text -->
                                @error('cfr')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Email Form Group -->
                            <div class="form-group my-4">
                                <!-- Email Label -->
                                <label class="control-label my-2">Email</label>
                                <!-- Email Input Text -->
                                <input type="email" name="email" id="email" placeholder="Inserisci l'email del corsista" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $customer->email}}">
                                <!-- Email Error Text -->
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer City Of Birth Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer City Of Birth Label -->
                                <label class="control-label my-2">Città di nascita *</label>
                                <!-- Customer City Of Birth Input Text -->
                                <input type="text" name="city_of_birth" id="city_of_birth" placeholder="Inserisci il cognome del corsista" class="form-control @error('city_of_birth') is-invalid @enderror" value="{{ old('city_of_birth') ?? $customer->city_of_birth }}" maxlength="60" required>
                                <!-- Customer City Of Birth Error Text -->
                                @error('city_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Date Of Birth Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer Date Of Birth Label -->
                                <label class="control-label my-2">Data di nascita *</label>
                                <!-- Customer Date Of Birth Input File -->
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" required>
                                <!-- Customer Date Of Birth Error Text -->
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Task Form Group -->
                            <div class="form-group my-4">
                                <!-- Customer Task Of Birth Label -->
                                <label class="control-label my-2">Mansione</label>
                                <!-- Customer Task Input Text -->
                                <input type="text" name="task" id="task" placeholder="Inserisci il cognome del corsista" class="form-control @error('task') is-invalid @enderror" value="{{ old('task') ?? $customer->task }}" maxlength="70">
                                <!-- Customer Task Error Text -->
                                @error('task')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Customer Cover Image Form Group -->
                            <div class="form-group my-4">
                                <!-- Cover Image Label -->
                                <label class="control-label my-2">Immagine del corsista</label>
                                <!-- Cover Image Input File -->
                                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" accept="image/jpg, image/jpeg, image/png, image/webp">
                                <!-- Cover Image Error Text -->
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Create Submit Button -->
                            <div class="col-12 d-flex justify-content-center align-items-center my-5">
                                <button type="submit" class="btn btn-success fw-bold px-5">MODIFICA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection