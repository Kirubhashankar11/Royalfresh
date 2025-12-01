@extends('adminlte::page')

@section('content')
<div class="container mt-4">
    <h3>Delivery Time Master</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="delivery-times/create" class="btn btn-primary mb-3">+ Add New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>City</th>
                <th>Time</th>
                <th>Charge</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deliveryTimes as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                       {{ $d->city }}
                    </td>
                    <td>{{ $d->time }}</td>
                    <td>₹{{ number_format($d->charge, 2) }}</td>
                    <td>
                        <a href="/delivery-times/{{ $d->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/delivery-times/{{ $d->id }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
