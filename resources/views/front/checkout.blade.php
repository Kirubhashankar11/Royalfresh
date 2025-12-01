@extends('layouts.front')

@section('content')
<div class="container mt-5">

    <h2>Checkout</h2>
    <hr>

    <form id="checkout-form">

        <div class="form-group">
            <label>City</label>
            <input type="number" name="city_id" class="form-control" required>
        </div>

        <h4 class="mt-4">Items</h4>
        <div id="checkout-items"></div>

        <button type="submit" class="btn btn-success mt-4">
            Place Order
        </button>
    </form>

</div>
@endsection
