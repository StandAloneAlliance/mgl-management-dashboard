@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input spellcheck="false" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onkeyup="handleChange()">
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
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
