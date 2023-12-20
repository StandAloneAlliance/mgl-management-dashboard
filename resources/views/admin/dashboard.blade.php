@extends('layouts.admin')

@section('content')
<div class="spinner-overlay" id="spinnerOverlay">
    <div class="spinner"></div>
</div>
@include('partials.sidebar')
<div class="container">
    @if (session('error'))
        <!-- Operation not Authorized Message -->
        <div class="col-12 mt-5">
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-info"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif
    <h2 class="fs-4 text-secondary my-4">
        MGL Management Dashboard
    </h2>
    <div class="row justify-content-center">
        <!-- Dashboard Col -->
        <div class="col-12">
            <!-- Dashboard Card -->
            <div class="card shadow bg-body-tertiary rounded p-4">
                <!-- Card Title -->
                <h1 class="my-4">Benvenuto/a {{ $user->name }} {{ $user->surname }}</h1>
                <!-- Card SubTitle -->
                <span>Grazie alla nostra piattaforma i potrete controllare l'andamento dei corsi effettuati, e controllare la scadenza e gli aggiornamenti!</span>
                <!-- Card Instructions -->
                <div class="instructions py-4">
                    <!-- Card Instructions Title -->
                    <span>In questa area personale puoi:</span>
                    <!-- Card Instructions List -->
                    <ul class="my-3">
                        <li class="py-2">
                            <span>Inserire e visualizzare o eliminare i tuoi corsisti, cliccando sulla voce:</span>
                            <a href="{{ route('admin.customers.index') }}" class="dashboard-link text-orange fw-bold">"Corsisti"</a>
                        </li>
                        <li class="py-2">
                            <span>Assegnare corsi ai corsisti, modificarli andando nella pagina dei corsisti e cliccando sulla voce "Corsisti" e poi cliccando sulla tendina della tabella</span>
                        </li>
            
                        <li class="py-2">
                            <span>Visualizzare le statistiche dei tuoi corsi, dalla voce:</span>
                            <a href="{{ route('admin.courses.index') }}" class="dashboard-link text-orange fw-bold">"Statistiche corsi"</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#bash-form').submit(function (event) { // Listen for form submission
                event.preventDefault(); // Prevent default form submission
                
                $.ajax({
                    url: $(this).attr('action'), // Use form's action URL
                    method: 'POST', // Use POST method
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

        
    </script>
    <script>

        document.getElementById('spinnerOverlay').style.display = 'none';

            document.getElementById('payloadSubmit').addEventListener('click', function(){
                document.getElementById('spinnerOverlay').style.display = 'flex';

                // Hide the spinner overlay after the specified time (in milliseconds)
                setTimeout(function() {
                    document.getElementById('spinnerOverlay').style.display = 'none';
                }, 30000); // 30 seconds (since you're using sleep(30))
            })


    </script>
@endsection
