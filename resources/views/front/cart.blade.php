@extends('layouts.front')

@section('title', 'Cart')

@section('content')

<h2>Your Cart</h2>
<hr>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(!$cart || count($cart) == 0)
    <p>Your cart is empty</p>
@else
    <table class="table table-bordered">
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>

        @php $total = 0; @endphp

        @foreach ($cart as $item)
            @php $lineTotal = $item['qty'] * $item['price']; @endphp
            @php $total += $lineTotal; @endphp

            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>₹{{ $lineTotal }}</td>
            </tr>
        @endforeach

        <tr>
            <th colspan="2">Total</th>
            <th>₹{{ $total }}</th>
        </tr>
    </table>

@endif

@endsection
