@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 text-center mb-4 mb-md-0">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow" style="max-height:420px; object-fit:cover; width:100%;">
            @else
                <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif
        </div>

        <div class="col-lg-6 col-md-6">
            <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
            <p class="text-muted mb-3">{{ $product->description ?? 'No description available.' }}</p>
            <div class="mb-3">
                <span class="fw-bold text-success">₹{{ number_format($product->price,2) }}</span>
            </div>
            <div class="d-flex align-items-center mb-4">
                <label class="me-3 fw-semibold">Quantity:</label>
                <div class="input-group" style="width:140px;">
                    <button class="btn btn-outline-secondary" id="decreaseBtn">−</button>
                    <input type="text" id="quantity" class="form-control text-center" value="1" readonly>
                    <button class="btn btn-outline-secondary" id="increaseBtn">+</button>
                </div>
            </div>
            <button class="btn btn-success addToCartBtn" 
                    data-id="{{ $product->id }}" 
                    data-name="{{ $product->name }}" 
                    data-price="{{ $product->price }}">
                <i class="bi bi-cart-plus me-2"></i> Add to Cart
            </button>
            <div class="mt-4">
                <a href="{{ route('products') }}" class="btn btn-outline-secondary">← Back to Products</a>
            </div>
        </div>
    </div>
</div>

@include('includes.cart') <!-- Include cart -->
<script>
document.getElementById('increaseBtn').addEventListener('click', ()=>{
    document.getElementById('quantity').value = parseInt(document.getElementById('quantity').value)+1;
});
document.getElementById('decreaseBtn').addEventListener('click', ()=>{
    let val = parseInt(document.getElementById('quantity').value);
    if(val>1) document.getElementById('quantity').value = val-1;
});
document.querySelector('.addToCartBtn').addEventListener('click',()=>{
    let qty = parseInt(document.getElementById('quantity').value);
    let btn = document.querySelector('.addToCartBtn');
    addToCart(btn.dataset.id, btn.dataset.name, parseFloat(btn.dataset.price), qty);
    document.getElementById('quantity').value = 1;
});
</script>
@endsection
