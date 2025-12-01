@extends('adminlte::page')

@section('content')
<div class="container mt-4">
    <h3>Add Location</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Select Location(s):</label>
            <select name="location[]" class="form-control" multiple required>
                @foreach($availableLocations as $loc)
                    <option value="{{ $loc }}">{{ $loc }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple.</small>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
