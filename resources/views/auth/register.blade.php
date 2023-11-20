@extends('layouts.admin')

@section('content')
<div class="container-fluid bg-container-register">
    <div class="container-register mt-4">
        <div class="row register-card">
            <h2>Registrati</h2>
            <h3>Inserisci le tue credenziali</h3>
            <form method="POST" action="{{ route('register') }}" class="col-lg-8 col-md-6 register-form">
            @csrf
                <div class="mb-2 form-group d-flex justify-content-start flex-wrap">
                    <label for="name" class="col-form-label">Inserisci il nome *</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Inserisci il nome">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <div class="mb-2 form-group d-flex justify-content-start flex-wrap">
                    <label for="surname" class="col-form-label">Inserisci il cognome *</label>
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Inserisci il cognome">
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <div class="mb-2 form-group d-flex justify-content-start flex-wrap">
                    <label for="email" class="col-form-label">Inserisci l'email *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Inserisci l'email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <div class="form-group d-flex justify-content-start flex-wrap">
                    <label for="password" class="col-form-label">Inserisci la password *</label>
                    <input spellcheck="false" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onkeyup="handleChange()" autofocus placeholder="Inserisci la passsword">
                    <div id="bars">
                        <div></div>
                    </div>
                    <div id="strength"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <div class="mb-2 form-group d-flex justify-content-start flex-wrap">
                    <label for="password-confirm" class="col-form-label">Conferma la password*</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="Ripeti la password">           
                </div>     
    
                <button type="submit" class="btn-register">
                    {{ __('Registrati') }}
                </button>
            </form>
        </div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/vanillajs@1.0.1/dest/cjs/index.min.js"></script>
<script>
    const bars = document.querySelector("#bars")
    let strengthDiv = document.querySelector("#strength")
    let passwordInput = document.querySelector("#password")

    const strength = {
        1: "weak",
        2: "medium",
        3: "strong"
    };

    const getIndicator = (password, value) => {
        for (let i = 0; i < password.length; i++) {
            let char = password.charCodeAt(i);
            if (!value.upper && char >= 65 && char <= 90) {
                value.upper = true
            } else if (value.numbers && char >= 48 && char <= 57){
                value.numbers = true
            } else if (!value.lower && char >= 97 && char <= 122){
                value.lower = true
            }
        }

        let indicator = 0
        for (let metric in value) {
            if (value[metric] === true) {
                indicator++
            }
        }

        return strength[indicator] ?? "";
    }

    const getStrength = (password) => {
        let strengthValue = {
            upper : false,
            numbers : false,
            lower: false,
        };

        return getIndicator (password, strengthValue);
    };

    const handleChange = () => {
        let { value: password } = passwordInput
        console.log(password)
        const strengthText = getStrength(password)
        bars.classList = ""

        if (strengthText) {
            strengthDiv.innerText = `${strengthText} password`
            bars.classList.add(strengthText)
        } else {
            strengthDiv.innerText = ""
        }
    }

</script>

@endsection
