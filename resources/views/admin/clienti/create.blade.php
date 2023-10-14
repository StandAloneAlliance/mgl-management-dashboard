@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.clienti.store') }}" method="POST">
                        @csrf
                        <h1>Aggiungi cliente</h1>

                        <div class="type d-flex justify-content-between">
                            <label for="type" class="display3 mt-3">Tipologia cliente</label>
                            <select name="tipo" class="mt-1 col-5" id="typeSelector">
                                <option value="" id="defaultSelect" selected>--scegliere la tipologia di cliente---</option>
                                <option value="persona">Privato</option>
                                <option value="azienda">Azienda</option>
                            </select>

                        </div>

                        {{-- Conditional HTML based on selected type --}}
                        <div id="personaFields" class="mt-4" style="display: none;">
                            {{-- HTML for "persona" type --}}
                            <!-- Add your "persona" specific form fields here -->
                            <div class="input-group">
                                <span class="input-group-text">Nome e cognome</span>
                                <input type="text" name="nome" aria-label="First name" class="form-control">
                                <input type="text" name="cognome" aria-label="Last name" class="form-control">
                            </div>
                            <div class="d-flex mt-2 justify-content-end">
                                <button class="btn btn-primary" type="submit">Inserisci</button>
                            </div>
                        </div>
                        
                        <div id="aziendaFields" class="mt-4" style="display: none;">
                            {{-- HTML for "azienda" type --}}
                            <!-- Add your "azienda" specific form fields here -->
                            <div class="input-group">
                                <span class="input-group-text">Ragione sociale</span>
                                <input type="text" name="ragione_sociale" aria-label="ragione_sociale" class="form-control">
                            </div>
                            <div class="d-flex mt-2 justify-content-end">
                                <button class="btn btn-primary" type="submit">Inserisci</button>
                            </div>
                        </div>


                    </form>

                        <script>
                            // JavaScript to show/hide fields based on the selected type
                            document.getElementById('typeSelector').addEventListener('change', function() {
                                var selectedType = this.value;

                                // Hide all fields by default
                                document.getElementById('defaultSelect').style.display = 'none';
                                document.getElementById('personaFields').style.display = 'none';
                                document.getElementById('aziendaFields').style.display = 'none';

                                // Show the fields based on the selected type
                                if (selectedType === 'persona') {
                                    console.log("persona")
                                    document.getElementById('personaFields').style.display = 'block';
                                } else if (selectedType === 'azienda') {
                                    console.log("azienda")
                                    document.getElementById('aziendaFields').style.display = 'block';
                                }
                            });
                        </script>


                </div>
                <div class="card-footer text-body-secondary d-flex justify-content-end">
                    <a id="btn_back_to_clienti_index" class="btn btn-secondary" href="{{ route('admin.clienti.index') }}" type="submit">Torna alla lista dei clienti</a>
                </div>

                
            </div>

        </div>
    </div>
</div>
    
@endsection