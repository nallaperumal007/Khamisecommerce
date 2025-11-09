if (!window.cart) window.cart = [];

// Add or update product in cart
function addToCart(productId, name, price, quantity = 1) {
    const idx = window.cart.findIndex((p) => p.id === productId);
    if (idx >= 0) {
        window.cart[idx].quantity += quantity;
        window.cart[idx].total = window.cart[idx].quantity * price;
    } else {
        window.cart.push({
            id: productId,
            name: name,
            price: price,
            quantity: quantity,
            total: price * quantity,
        });
    }
    renderCart();
}

// Render cart modal and count
function renderCart() {
    const cartBody = document.getElementById("cartBody");
    const cartCount = document.getElementById("cartCount");
    const cartTotal = document.getElementById("cartTotal");

    cartCount.textContent = window.cart.reduce((a, b) => a + b.quantity, 0);
    cartTotal.textContent = window.cart
        .reduce((a, b) => a + b.total, 0)
        .toFixed(2);

    if (window.cart.length === 0) {
        cartBody.innerHTML = '<p class="text-muted">Your cart is empty.</p>';
        return;
    }

    cartBody.innerHTML = window.cart
        .map(
            (item, i) => `
        <div class="d-flex justify-content-between align-items-center border-bottom py-2" data-index="${i}">
            <div>
                <strong>${item.name}</strong><br>
                <div class="d-flex align-items-center mt-1">
                    <button class="btn btn-sm btn-outline-secondary decreaseItem me-1">−</button>
                    <input type="text" class="form-control text-center quantityInput" value="${
                        item.quantity
                    }" style="width:50px;" readonly>
                    <button class="btn btn-sm btn-outline-secondary increaseItem ms-1">+</button>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="fw-semibold text-success me-3">₹${item.total.toFixed(
                    2
                )}</span>
                <button class="btn btn-sm btn-danger removeItem"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    `
        )
        .join("");

    // Add event listeners dynamically
    document.querySelectorAll(".increaseItem").forEach((btn, i) => {
        btn.addEventListener("click", () => {
            window.cart[i].quantity++;
            window.cart[i].total =
                window.cart[i].quantity * window.cart[i].price;
            renderCart();
        });
    });

    document.querySelectorAll(".decreaseItem").forEach((btn, i) => {
        btn.addEventListener("click", () => {
            if (window.cart[i].quantity > 1) {
                window.cart[i].quantity--;
                window.cart[i].total =
                    window.cart[i].quantity * window.cart[i].price;
                renderCart();
            }
        });
    });

    document.querySelectorAll(".removeItem").forEach((btn, i) => {
        btn.addEventListener("click", () => {
            window.cart.splice(i, 1);
            renderCart();
        });
    });
}

// Show cart modal
document.getElementById("cartIcon")?.addEventListener("click", () => {
    const cartModal = new bootstrap.Modal(document.getElementById("cartModal"));
    cartModal.show();
});

// Add to cart buttons
document.querySelectorAll(".addToCartBtn").forEach((btn) => {
    btn.addEventListener("click", () => {
        addToCart(
            btn.dataset.id,
            btn.dataset.name,
            parseFloat(btn.dataset.price)
        );
    });
});
