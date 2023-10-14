@extends('layouts.admin')

@section('content')
<h1>Pipeline successfully triggered!</h1>
<hr>
<h1>Object print</h1>

<ul>
    @foreach ($objects as $object) 
        <li>
            @foreach ($object as $key => $value)
                {{-- @if ($key != 2 && $key != 6) --}}
                    <ul>
                        <li>
                            {{ $value }} 
                        </li>
                    </ul>
                {{-- @endif --}}
            @endforeach
        </li>
    @endforeach
</ul>
<form action="{{ route('admin.courses.store') }}" method="POST">
    @csrf
    <!-- Include form fields for course data -->
    <button type="submit">Create Course</button>
</form>


@endsection
