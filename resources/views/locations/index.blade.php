@extends('adminlte::page')


@section('content')
<div class="container mt-4">
    <h3>Location Master</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">+ Add New Location</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Locations</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($locations as $key => $loc)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $loc->name }}</td>
                    <td>
                        @foreach($loc->location as $l)
                            <span class="badge bg-info text-dark">{{ $l }}</span>
                        @endforeach
                    </td>
                    <td>
                         <a href="{{ route('locations.edit', $loc->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('locations.destroy', $loc->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
