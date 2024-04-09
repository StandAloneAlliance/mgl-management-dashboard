@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.courses.modify', ['customer_id' => $customer->id, 'course_id' => $course->id]) }}" method="POST" enctype="multipart/form-data" id="createRestaurantForm" class="card shadow bg-body-tertiary p-2">
                        @csrf
                        @method('PUT')
                        <!-- Card Header -->
                        <div class="card-header bg-white py-3">
                            <!-- Create Title -->
                            <h1 class="text-center">Modifica il corso</h1>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="form-group my-4 d-flex flex-column">
                                <!-- Name Label -->
                                <label class="control-label my-2">Modifica la validità del corso *</label>
                                <!-- Name Input Text -->
                                <select name="status" class="w-50">
                                    <option class="w-50" value="Valido">Valido</option>
                                    <option class="w-50" value="In Scadenza">In Scadenza</option>
                                    <option class="w-50" value="Scaduto">Scaduto</option>
                                </select>
                                <!-- Name Error Text -->
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center my-5">
                                <button type="submit" class="btn btn-success fw-bold px-5">MODIFICA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection