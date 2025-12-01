@extends('adminlte::page')
@section('title', 'Review Policies')
@section('content_header')
    <h1>Review Policies</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Shipping Policies</h4>
                        <a href="{{ route('shipping-policies.create') }}" class="btn btn-primary float-right">Add New Policy</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>Shipping Policy</td>
                                        <td>
                                            <a href="{{ route('shipping-policies.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('shipping-policies.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection