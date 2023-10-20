@extends('layouts.admin')

@section('content')
<div class="container-login">
    <div class="login-card">
        <h2>Accedi</h2>
        <h3>Inserisci le tue credenziali</h3>
        <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
            <input id="email" type="email" placeholder="Inserisci l'email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password" type="password" placeholder="Inserisci la password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="col-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Ricordami') }}
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="login-link text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('Hai dimenticato la password?') }}
                </a>
            @endif

            <button type="submit" class="btn-login">
                {{ __('Accedi') }}
            </button>
        </form>
    </div>
</div>
@endsection
