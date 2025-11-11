<!-- includes/cart.blade.php -->

<!-- Floating Cart Icon -->
<div id="cartIcon" class="position-fixed" style="bottom:30px; right:30px; z-index:1050;">
    <button class="btn btn-warning rounded-circle position-relative" style="width:60px; height:60px;">
        <i class="bi bi-cart3 fs-4 text-dark"></i>
        <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
    </button>
</div>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-end">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark fw-bold" id="cartModalLabel">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="cartBody">
        <p class="text-muted">Your cart is empty.</p>
      </div>
      <div class="modal-footer">
        <strong>Total: ₹<span id="cartTotal">0</span></strong>
        <button class="btn btn-success" id="checkoutBtn">Checkout</button>
      </div>
    </div>
  </div>
</div>

<script>
if(!window.cart){
    // Load cart from localStorage if available
    window.cart = JSON.parse(localStorage.getItem('cart')) || [];
}

// Save cart to localStorage
function saveCart(){
    localStorage.setItem('cart', JSON.stringify(window.cart));
}

// Add or update product in cart
function addToCart(productId, name, price, quantity = 1){
    const idx = window.cart.findIndex(p=>p.id===productId);
    if(idx >= 0){
        window.cart[idx].quantity += quantity;
        window.cart[idx].total = window.cart[idx].quantity * price;
    } else {
        window.cart.push({id:productId,name:name,price:price,quantity:quantity,total:price*quantity});
    }
    saveCart();
    renderCart();
}

// Render cart modal and count
function renderCart(){
    const cartBody = document.getElementById('cartBody');
    const cartCount = document.getElementById('cartCount');
    const cartTotal = document.getElementById('cartTotal');

    cartCount.textContent = window.cart.reduce((a,b)=>a+b.quantity,0);
    cartTotal.textContent = window.cart.reduce((a,b)=>a+b.total,0).toFixed(2);

    if(window.cart.length===0){
        cartBody.innerHTML = '<p class="text-muted">Your cart is empty.</p>';
        return;
    }

    cartBody.innerHTML = window.cart.map((item,i)=>`
        <div class="d-flex justify-content-between align-items-center border-bottom py-2" data-index="${i}">
            <div>
                <strong>${item.name}</strong><br>
                <div class="d-flex align-items-center mt-1">
                    <button class="btn btn-sm btn-outline-secondary decreaseItem me-1">−</button>
                    <input type="text" class="form-control text-center quantityInput" value="${item.quantity}" style="width:50px;" readonly>
                    <button class="btn btn-sm btn-outline-secondary increaseItem ms-1">+</button>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="fw-semibold text-success me-3">₹${item.total.toFixed(2)}</span>
                <button class="btn btn-sm btn-danger removeItem"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    `).join('');

    // Dynamic event listeners
    document.querySelectorAll('.increaseItem').forEach((btn,i)=>{
        btn.addEventListener('click',()=>{ 
            window.cart[i].quantity++; 
            window.cart[i].total = window.cart[i].quantity * window.cart[i].price; 
            saveCart();
            renderCart(); 
        });
    });
    document.querySelectorAll('.decreaseItem').forEach((btn,i)=>{
        btn.addEventListener('click',()=>{ 
            if(window.cart[i].quantity>1){
                window.cart[i].quantity--; 
                window.cart[i].total = window.cart[i].quantity * window.cart[i].price; 
                saveCart();
                renderCart(); 
            }
        });
    });
    document.querySelectorAll('.removeItem').forEach((btn,i)=>{
        btn.addEventListener('click',()=>{ 
            window.cart.splice(i,1); 
            saveCart();
            renderCart(); 
        });
    });
}

// Show cart modal
document.getElementById('cartIcon').addEventListener('click',()=>{
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    cartModal.show();
});

// ✅ Checkout click — only one handler
document.getElementById('checkoutBtn').addEventListener('click', () => {
    @if(auth()->check())
        window.location.href = "{{ route('checkout') }}";
    @else
        alert('Please login to continue checkout.');
        window.location.href = "{{ route('account.login') }}";
    @endif
});

// Render cart initially
renderCart();
</script>
