@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Subscription Master</h2>
    <a href="/subscriptions-list/create" class="btn btn-primary mb-3">Add Subscription</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subscription</th>
                <th>City</th>
                <th>Milk Variety</th>
                <th>1L Price</th>
                <th>1.5L Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->id }}</td>
                <td>{{ ucfirst($subscription->subscription) }} Subscription</td>
                <td>{{ $subscription->city }}</td>
                <td>{{ $subscription->milk_variety }}</td>
                <td>{{ $subscription->unit_1l_price }}</td>
                <td>{{ $subscription->unit_1_5l_price }}</td>
                <td>
                    <a href="/subscriptions-list/{{ $subscription->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/subscriptions-list/{{ $subscription->id }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subscription?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
