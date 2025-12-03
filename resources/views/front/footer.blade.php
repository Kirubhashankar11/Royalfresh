<!-- Contact/Other Footer Section (Simple) -->
<section
  id="contact"
  style="text-align: center; padding: 40px 4vw 28px 4vw; font-size: 1.12em; color: #555"
>
  <b>Contact Us:</b> info@royalfresh.com | +91-1234-567-890 <br />
  <small>© 2025 Royal Fresh. All rights reserved.</small>
</section>

<!-- UNIVERSAL ADD-TO-CART SCRIPT -->
<script>
(function () {

    const STORAGE_KEY = "cartData";

    function loadCart() {
        try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; }
        catch { return []; }
    }

    function saveCart(cart) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
    }

    function updateBadge() {
        const badge = document.getElementById("cartBadge");
        if (!badge) return;
        const total = loadCart().reduce((sum, i) => sum + i.quantity, 0);
        badge.textContent = total;
    }

    function addToCart(btn) {
        const card = btn.closest(".product-card");
        if (!card) {
            console.warn("No product card found");
            return;
        }

        const id = card.dataset.id;
        const title = card.dataset.title;
        const price = parseFloat(card.dataset.price);
        const image = card.dataset.image;
        const weight = card.dataset.weight || "";
        const qtyInput = card.querySelector(".product-qty");
        const quantity = qtyInput ? parseInt(qtyInput.value) : 1;

        let cart = loadCart();
        let existing = cart.find(i => i.id == id && i.weight == weight);

        if (existing) {
            existing.quantity += quantity;
        } else {
            cart.push({ id, title, price, image, weight, quantity });
        }

        saveCart(cart);
        updateBadge();

        btn.classList.add("added-to-cart");
        setTimeout(() => btn.classList.remove("added-to-cart"), 500);

        console.log("CART UPDATED:", cart);
    }

    function attachEvents() {
        document.querySelectorAll(".add-cart-btn").forEach(btn => {
            if (btn.dataset.bound) return;
            btn.dataset.bound = true;
            btn.addEventListener("click", function () {
                addToCart(btn);
            });
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        updateBadge();
        attachEvents();
    });

})();
</script>

<!-- QUANTITY BUTTON SCRIPT -->
<script>
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("qty-plus")) {
        const box = e.target.parentElement.querySelector(".product-qty");
        box.value = parseInt(box.value) + 1;
    }

    if (e.target.classList.contains("qty-minus")) {
        const box = e.target.parentElement.querySelector(".product-qty");
        if (parseInt(box.value) > 1) box.value = parseInt(box.value) - 1;
    }
});
</script>

<style>
.added-to-cart {
    transform: scale(0.95);
    background: #3d2b10 !important;
    transition: 0.15s;
}
</style>
