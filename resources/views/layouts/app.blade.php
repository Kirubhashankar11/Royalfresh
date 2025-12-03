<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Royal Fresh') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Main Frontend CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- Added -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Added -->

</head>

<body>
    <div id="app">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    Royal Fresh
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/cart" class="nav-link">
                                🛒 Cart <span id="cartBadge">0</span>
                            </a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        {{-- MAIN CONTENT --}}
        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <!-- ============================= -->
    <!--   UNIVERSAL CART SCRIPT       -->
    <!-- ============================= -->
    <script>
        (function () {
            const STORAGE_KEY = 'cartData';

            function loadCart() {
                try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; }
                catch { return []; }
            }

            function saveCart(cart) {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
            }

            function renderCartBadge() {
                const badge = document.getElementById('cartBadge');
                if (!badge) return;
                const total = loadCart().reduce((s, i) => s + (parseInt(i.quantity) || 0), 0);
                badge.textContent = total;
            }

            function parsePrice(text) {
                if (!text) return 0;
                const m = text.replace(/,/g, '').match(/(\d+(\.\d+)?)/);
                return m ? parseFloat(m[0]) : 0;
            }

            function getFieldFromCard(card) {
                const id = card.dataset.id || null;
                const title = (card.dataset.title ||
                    (card.querySelector('.product-title')?.textContent || '')).trim();
                const price = parseFloat(card.dataset.price ||
                    parsePrice(card.querySelector('.product-price')?.textContent || '')) || 0;
                const image = card.dataset.image ||
                    (card.querySelector('.product-image')?.src || '');

                const weightSelect = card.querySelector('.product-weight');
                const weight = weightSelect ? weightSelect.value : (card.dataset.weight || '');

                const qtyInput = card.querySelector('.product-qty');
                const quantity = qtyInput ? Math.max(1, parseInt(qtyInput.value)) : 1;

                return { id, title, price, image, weight, quantity };
            }

            function addToCartFromCard(card, button) {
                const info = getFieldFromCard(card);
                const productId = info.id || (info.title + '::' + info.weight);

                const cart = loadCart();
                const exists = cart.find(i =>
                    String(i.id) === String(productId) &&
                    String(i.weight) === String(info.weight)
                );

                if (exists) exists.quantity += info.quantity;
                else cart.push(info);

                saveCart(cart);
                renderCartBadge();

                if (button) {
                    button.classList.add('added-to-cart');
                    setTimeout(() => button.classList.remove('added-to-cart'), 500);
                }
            }

            function attachHandlers(root = document) {
                const buttons = root.querySelectorAll('.add-cart-btn');
                buttons.forEach(btn => {
                    if (btn.__bound) return;
                    btn.__bound = true;

                    btn.addEventListener('click', function () {
                        const card = btn.closest('.product-card');
                        if (card) addToCartFromCard(card, btn);
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', () => {
                attachHandlers();
                renderCartBadge();
            });
        })();
    </script>

    <style>
        .added-to-cart {
            transform: scale(0.95);
            transition: 0.15s;
        }
    </style>

    <!-- Your frontend JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>