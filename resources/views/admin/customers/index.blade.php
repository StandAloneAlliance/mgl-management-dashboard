@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
        @if (count($customers) > 0)
        <div class="row">
            <div class="col-6">
                <a href="{{ route('admin.customers.create')}}" class="btn btn-primary">Aggiungi corsista</a>
            </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
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
