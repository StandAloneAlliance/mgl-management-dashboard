@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <a href="{{ route('admin.customers.create')}}" class="btn btn-primary">Aggiungi corsista</a>
                <div>
                    <table class="table">
                        <h3>Corsisti</h3> 
                        @if(count($customers) > 0)
                            <thead>
                                <tr>
                                    <th>Nome e Cognome</th>
                                    <th>C.F.</th>
                                    <th>Mansione</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                @foreach ($customers as $customer)  
                                    <td>{{ $customer->name }} {{ $customer->surname }}</td>
                                    <td>{{ $customer->cfr }}</td>
                                    <td>
                                        @if (empty($customer->task))
                                            N.D.
                                        @endif
                                        {{ $customer->task }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.customers.show', $customer)}}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('admin.customers.edit', $customer)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="customer-delete-button" data-customer-name="{{ $customer->name }} {{ $customer->surname}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.courses.assign', $customer)}}" class="btn btn-primary">Assign Course</a>
                                    </td>
                                @endforeach
                                </tr>
                            </tbody>
                        @else
                            <h3>Non ci sono corsisti disponibili</h3>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('partials.modal_customer_delete');
@endsection
