<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>

    <style>
        body {
            margin: 0;
            background: #fff9f0;
            font-family: Poppins, sans-serif;
        }

        .container {
            padding: 130px 40px;
            display: flex;
            justify-content: center;
        }

        .cart-sidebar {
            width: 350px;
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #e8e1d5;
        }

        .cart-sidebar h3 {
            font-size: 22px;
            color: #62451c;
            margin-bottom: 20px;
            border-bottom: 2px solid #c8a97e;
            padding-bottom: 10px;
        }

        .cart-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 18px;
            padding: 12px;
            border: 1px solid #f0e6d5;
            border-radius: 12px;
            position: relative;
        }

        .cart-item img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 50%;
        }

        .cart-title {
            font-size: 15px;
            font-weight: 600;
            color: #3d2b10;
        }

        .cart-weight {
            font-size: 13px;
            color: #62451c;
            font-style: italic;
        }

        .cart-price {
            font-size: 14px;
            font-weight: 600;
            color: #62451c;
            margin-top: 5px;
        }

        .qty-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }

        .qty-controls button {
            background: #62451c;
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
        }

        .qty-controls input {
            width: 40px;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            border: 1px solid #c8a97e;
            border-radius: 6px;
            padding: 3px 0;
        }

        .remove-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            background: #ff4d4d;
            color: white;
            border: none;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 12px;
        }

        .cart-total {
            margin-top: 20px;
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            color: #62451c;
            border-top: 2px solid #c8a97e;
            padding-top: 15px;
        }
    </style>
</head>

<body>

    {{-- Header --}}
    @include('front.header')

    <div class="container">
        <aside class="cart-sidebar" id="newCartSidebar">
            <h3>Shopping Cart</h3>
            <p>Your cart is empty</p>
        </aside>
    </div>

    <script>
        console.log("CartData = ", localStorage.getItem("cartData"));

        let cart = JSON.parse(localStorage.getItem("cartData")) || [];

        function renderCartPage() {
            const sidebar = document.getElementById("newCartSidebar");

            if (cart.length === 0) {
                sidebar.innerHTML = "<h3>Shopping Cart</h3><p>Your cart is empty</p>";
                return;
            }

            let html = "<h3>Shopping Cart</h3>";
            let total = 0;

            cart.forEach(item => {
                total += item.price * item.quantity;

                html += `
                <div class="cart-item">
                    <img src="${item.image}" alt="">
                    <div style="flex:1">
                        <div class="cart-title">${item.title}</div>
                        <div class="cart-weight">${item.weight}</div>
                        <div class="cart-price">AED ${item.price}</div>

                        <div class="qty-controls">
                            <button onclick="changeQty('${item.id}','${item.weight}', -1)">-</button>
                            <input type="text" value="${item.quantity}" readonly>
                            <button onclick="changeQty('${item.id}','${item.weight}', 1)">+</button>
                        </div>
                    </div>

                    <button class="remove-btn" onclick="removeItem('${item.id}','${item.weight}')">×</button>
                </div>
                `;
            });

            html += `<div class="cart-total">Total: AED ${total}</div>`;

            sidebar.innerHTML = html;
        }

        function changeQty(id, weight, change) {
            let item = cart.find(i => i.id == id && i.weight == weight);

            if (!item) return;

            item.quantity += change;

            if (item.quantity <= 0) {
                cart = cart.filter(i => !(i.id == id && i.weight == weight));
            }

            localStorage.setItem("cartData", JSON.stringify(cart));
            renderCartPage();
        }

        function removeItem(id, weight) {
            cart = cart.filter(i => !(i.id == id && i.weight == weight));
            localStorage.setItem("cartData", JSON.stringify(cart));
            renderCartPage();
        }

        renderCartPage();
    </script>

</body>

</html>
