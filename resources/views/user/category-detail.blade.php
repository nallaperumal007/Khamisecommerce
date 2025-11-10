@extends('layout.app')

@section('content')
<div class="container py-5">

    {{-- ✅ Category Header --}}
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">{{ $category->name }}</h2>
            <p style="font-size:1.1rem; line-height:1.6;">
                {{ $category->description ?? 'No description available.' }}
            </p>
            <a href="{{ route('user.category') }}" class="btn btn-outline-success mt-3">
                ← Back to Categories
            </a>
        </div>

        <div class="col-lg-6 col-md-6 text-center">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" 
                     alt="{{ $category->name }}" 
                     class="img-fluid rounded shadow" 
                     style="max-height:400px; object-fit:cover; width:100%;">
            @else
                <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif
        </div>
    </div>

    {{-- ✅ Products List --}}
    <h3 class="fw-bold mb-4 text-center">Products in {{ $category->name }}</h3>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top" 
                             style="height:220px; object-fit:cover;">
                        
                        <div class="card-body">
                            <h5 class="fw-semibold">{{ $product->name }}</h5>
                            <p class="text-success fw-bold mb-2">₹{{ number_format($product->price, 2) }}</p>

                            {{-- Quantity Controls --}}
                            <div class="input-group mb-3" style="width:130px;">
                                <button class="btn btn-outline-secondary decreaseBtn">−</button>
                                <input type="text" class="form-control text-center quantityInput" value="1" readonly>
                                <button class="btn btn-outline-secondary increaseBtn">+</button>
                            </div>

                            {{-- Add to Cart Button --}}
                            <button class="btn btn-success w-100 addToCartBtn" 
                                    data-id="{{ $product->id }}" 
                                    data-name="{{ $product->name }}" 
                                    data-price="{{ $product->price }}">
                                <i class="bi bi-cart-plus me-2"></i> Add to Cart
                            </button>

                            {{-- View Details --}}
                            <a href="{{ route('user.product.detail', $product->id) }}" 
                               class="btn btn-outline-secondary w-100 mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">No products found in this category.</p>
    @endif
</div>

@include('includes.cart') <!-- same cart modal include -->

<script>
document.addEventListener("DOMContentLoaded", () => {
    // ✅ Handle quantity buttons per product card
    document.querySelectorAll('.card').forEach(card => {
        const increaseBtn = card.querySelector('.increaseBtn');
        const decreaseBtn = card.querySelector('.decreaseBtn');
        const qtyInput = card.querySelector('.quantityInput');

        if (increaseBtn && decreaseBtn && qtyInput) {
            increaseBtn.addEventListener('click', () => {
                qtyInput.value = parseInt(qtyInput.value) + 1;
            });

            decreaseBtn.addEventListener('click', () => {
                let val = parseInt(qtyInput.value);
                if (val > 1) qtyInput.value = val - 1;
            });
        }
    });

    // ✅ Single, safe Add-to-Cart handler
    // Remove previous click handlers (avoid duplicates)
    document.querySelectorAll('.addToCartBtn').forEach(btn => {
        btn.replaceWith(btn.cloneNode(true)); // clone removes old listeners
    });

    document.body.addEventListener('click', function (e) {
        const btn = e.target.closest('.addToCartBtn');
        if (!btn) return;

        const card = btn.closest('.card');
        const qtyInput = card.querySelector('.quantityInput');
        const qty = parseInt(qtyInput.value);
        const price = parseFloat(btn.dataset.price);

        // ✅ Add to cart once
        addToCart(btn.dataset.id, btn.dataset.name, price, qty);

        // Reset quantity
        qtyInput.value = 1;
    });
});
</script>


@endsection
