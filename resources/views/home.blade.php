@extends('layouts.admin')
@section('content')

<div class="jumbotron p-5 mb-4 rounded-3">
    <div class="container card shadow bg-body-tertiary py-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center p-3">
                    @if (Auth::user())
                        <h1 class="mb-3">Benvenuto nel tuo scadenziaro personale della MGL Consulting S.r.l.s.</h1>
                    @else
                        <h1 class="mb-3">Benvenuto nello scadenziario MGL Consulting S.r.l.s.</h1>
                    @endif
                    <h4 class="mb-3">Registrati per inserire nuovi corsisti</h4>
                </div>
            </div>
            @if (Auth::user())
                <div class="col-12 text-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success button-color">Accedi alla tua Dashboard</a>
                </div>
            @endif
        </div>
    </div>
    <div class="container card shadow bg-body-tertiary p-4 my-5">
        <div class="row align-items-center">
            <div class="text-center">
                <h1 class="mb-5">Cosa puoi fare</h1>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center">
                    <i class="fa-solid fa-circle-info fa-xl mb-4"></i>
                    <p>Gestire i corsisti e i relativi corsi</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center">
                    <i class="fa-solid fa-receipt fa-2xl mb-4"></i>
                    <p>Controllare i corsi in maniera efficiente</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center">
                    <i class="fa-solid fa-ranking-star fa-2xl mb-4"></i>
                    <p>Visionare le statistiche dei corsi effettuati</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection