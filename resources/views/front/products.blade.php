@extends('layouts.front')

@section('title', 'Products')

@section('content')

    <h2>Our Products</h2>
    <hr>

    <div class="row">

        @foreach ($products as $p)
            <div class="col-md-4 mb-3">
                <div class="card product-card" data-id="{{ $p->id }}" data-title="{{ $p->product_name }}"
                    data-price="{{ $p->total_selling_price ?? $p->s_discount_price ?? $p->s_price ?? 0 }}">

                    <div class="card-body">

                        <!-- Product Title -->
                        <h5 class="product-title">{{ $p->product_name }}</h5>

                        <!-- Product Price -->
                        <p class="product-price">
                            AED {{ $p->total_selling_price ?? $p->s_discount_price ?? $p->s_price ?? 0 }}
                        </p>

                        <!-- Quantity Controls -->
                        <div class="quantity-controls">
                            <button type="button" class="qty-minus">−</button>
                            <input type="number" class="product-qty" value="1" min="1">
                            <button type="button" class="qty-plus">+</button>
                        </div>

                        <!-- Add to Cart Button -->
                        <button class="add-cart-btn w-100">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>

                    </div>
                </div>
            </div>
        @endforeach

    </div>


    {{-- ========================= --}}
    {{-- UNIVERSAL ADD TO CART JS --}}
    {{-- ========================= --}}
    <script>
        (function () {

            const STORAGE_KEY = 'cartData';

            function loadCart() {
                try {
                    const raw = localStorage.getItem(STORAGE_KEY);
                    return raw ? JSON.parse(raw) : [];
                } catch {
                    return [];
                }
            }

            function saveCart(cart) {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
            }

            function renderCartBadge() {
                const badge = document.getElementById('cartBadge');
                if (!badge) return;

                const cart = loadCart();
                const total = cart.reduce((a, b) => a + (b.quantity || 0), 0);
                badge.textContent = total;
            }

            function parsePrice(text) {
                const m = text.replace(/[^\d.]/g, '').match(/(\d+(\.\d+)?)/);
                return m ? parseFloat(m[0]) : 0;
            }

            function addToCart(btn) {
                const card = btn.closest('.product-card');
                if (!card) return;

                const id = card.dataset.id;
                const price = parsePrice(card.querySelector(".product-price").textContent);
                const qty = parseInt(card.querySelector(".product-qty").value);
                const title = card.dataset.title;

                const product = {
                    id,
                    title,
                    price,
                    quantity: qty
                };

                let cart = loadCart();
                let existing = cart.find(i => i.id == id);

                if (existing) {
                    existing.quantity += qty;
                } else {
                    cart.push(product);
                }

                saveCart(cart);
                renderCartBadge();

                btn.classList.add("added-to-cart");
                setTimeout(() => btn.classList.remove("added-to-cart"), 700);
            }

            function bindButtons() {
                document.querySelectorAll(".add-cart-btn").forEach(btn => {
                    if (btn.__bind) return;
                    btn.__bind = true;
                    btn.addEventListener("click", () => addToCart(btn));
                });
            }

            document.addEventListener("DOMContentLoaded", () => {
                bindButtons();
                renderCartBadge();
            });

        })();
    </script>


    {{-- ========================= --}}
    {{-- QUANTITY BUTTONS JS --}}
    {{-- ========================= --}}
    <script>
        document.addEventListener("click", function (e) {

            // + button
            if (e.target.classList.contains("qty-plus")) {
                let input = e.target.closest(".quantity-controls").querySelector(".product-qty");
                input.value = parseInt(input.value) + 1;
            }

            // – button
            if (e.target.classList.contains("qty-minus")) {
                let input = e.target.closest(".quantity-controls").querySelector(".product-qty");
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }

        });
    </script>


    <style>
        /* ========================= */
        /* BEAUTIFUL UI STYLING      */
        /* ========================= */

        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .quantity-controls button {
            background: #62451c;
            color: white;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
            transition: 0.2s;
        }

        .quantity-controls button:hover {
            background: #3d2b10;
        }

        .quantity-controls input {
            width: 55px;
            padding: 6px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            border: 1.5px solid #e8e1d5;
            border-radius: 8px;
        }

        .add-cart-btn {
            background: #62451c;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .add-cart-btn:hover {
            background: #3d2b10;
            transform: translateY(-3px);
        }

        .added-to-cart {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: 0.15s;
        }
    </style>

@endsection