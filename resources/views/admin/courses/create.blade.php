@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="select-courses">
                            <label for="nome_corso">Scegli il tuo corso</label>
                            <select name="nome_corso" class="select2 form-control select2-hidden-accessible">
                                    @foreach ($types as $key => $type)
                                    {{-- ESEMPIO DI MENU' A TENDINA DA CICLARE CON ARRAY DEI CORSI --}}
                                    <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                            </select>  
                        </div>

                        <div class="places-avaiable d-flex flex-column">
                            <label for="posti_disponibili">Posti disponibili</label>
                            <input type="number" name="posti_disponibili" id="posti_disponibili">
                        </div>

                        <div class="city">
                            <input type="text" name="" id="">
                            <input type="text" name="" id="">
                            <input type="text" name="" id="">
                            <select name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection