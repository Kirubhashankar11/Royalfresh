@extends('layouts.front')

@section('title', 'Products')

@section('content')

<h2>Our Products</h2>
<hr>

<div class="row">

    @foreach ($products as $p)
        <div class="col-md-4 mb-3">
            <div class="card product-card" data-id="{{ $p->id }}">
                <div class="card-body">
                    
                    <h5>{{ $p->product_name }}</h5>

                    <p>
                        Price: AED 
                        {{ $p->total_selling_price 
                            ?? $p->s_discount_price 
                            ?? $p->s_price 
                            ?? 0 }}
                    </p>

                    <!-- Hidden default quantity -->
                    <input type="hidden" class="qty-input" value="1">

                    <button class="btn btn-primary w-100 add-cart-btn">
                        Add to Cart
                    </button>

                </div>
            </div>
        </div>
    @endforeach

</div>


{{-- ========================= --}}
{{-- ADD TO CART AJAX SCRIPT   --}}
{{-- ========================= --}}
<script>
document.querySelectorAll('.add-cart-btn').forEach(btn => {
    
    btn.addEventListener('click', function () {

        const card = this.closest('.product-card');
        const productId = card.getAttribute('data-id');
        const qty = card.querySelector('.qty-input').value;

        fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_id: productId,
                qty: qty
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        })
        .catch(err => console.error("Error:", err));
    });

});
</script>

@endsection
