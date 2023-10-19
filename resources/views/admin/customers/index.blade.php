@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
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
        @if (count($customers) > 0)
        <div class="row d-flex justify-content-center">
            <div class="col">
                <a href="{{ route('admin.customers.create')}}" class="btn btn-sm btn-primary mx-3">Aggiungi corsista</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8 my-5">
                <form action="{{ route('admin.customers.index')}}" method="GET" class="input-group d-flex">
                    @csrf
                    <input type="text" class="form-control ms-3" name="keyword" placeholder="Cerca per nome">
                    <input type="text" class="form-control ms-3" name="surname" placeholder="Cerca per cognome">
                    <input type="text" class="form-control ms-3" name="fiscal_code" placeholder="Cerca per C.F.">
                    <div class="input-group-append mx-3">
                        <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                    </div>
                </form>
            </div>

            <div class="col-8">
                <table class="table table-striped shadow bg-body-tertiary">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Foto</th>
                            <th scope="col">Nome e Cognome</th>
                            <th scope="col">C.F.</th>
                            <th scope="col">Mansione</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($customers as $customer) 
                            <tr class="text-center">
                                <td class="w-25">
                                    @if (empty($customer->cover_image))
                                        <!-- Place-Holder Image -->
                                        <img class="card-img-top b-radius" src="{{ Vite::asset('resources/images/placeholder-image-customer.jpg') }}" alt="customer-place-holder-image">
                                    @else
                                        <!-- Cover Image -->
                                        <img class="card-img-top b-radius" src="{{ asset('storage/'.$customer->cover_image) }}" alt="customer-cover-image">
                                    @endif
                                </td>
                                <td>{{ $customer->name }} {{ $customer->surname }}</td>
                                <td class="text-uppercase">{{ $customer->cfr }}</td>
                                <td>
                                    @if (empty($customer->task))
                                        N.D.
                                    @endif
                                    {{ $customer->task }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Azioni
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.customers.show', $customer)}}">Dettagli corsista</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.customers.edit', $customer)}}">Modifica i dati del corsista</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.courses.assign', $customer)}}">Assegna corso</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="customer-delete-button dropdown-item" data-customer-name="{{ $customer->name }} {{ $customer->surname}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-white border-0">
                                                        Cancella corsista
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        @else
            <div class="row d-flex justify-content-center h-50">
                <div class="col-10 h-50">
                    <table class="table table-striped shadow bg-body-tertiary h-100 mt-5">
                        <tbody>
                            <tr class="text-center align-middle">
                                <td>
                                    <h3>Non ci sono corsisti disponibili</h3>
                                    <a href="{{ route('admin.customers.create')}}" class="link-underline link-underline-opacity-0">Clicca qui per aggiungere un corsista</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        @endif
    </div>
@include('partials.modal_customer_delete');
@endsection
