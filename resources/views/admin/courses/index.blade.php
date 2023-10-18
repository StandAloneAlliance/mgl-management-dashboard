@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
<div class="container">
    <div class="row justify-content-center">
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
        <!-- Card Restaurant Order Statistics -->
        <div class="col-12 d-flex justify-content-center align-items-center bg-white my-5">
            <canvas id="coursesChart"></canvas>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('coursesChart').getContext('2d');
        var data = {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Numero di Corsi',
                data: {!! json_encode($courseCounts) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
    
        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            // Mostra solo numeri interi
                            if (Math.floor(value) === value) {
                                return value;
                            }
                        }
                    }
                }
            }
        };
    
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>
    
@endsection
