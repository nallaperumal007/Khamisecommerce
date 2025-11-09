@extends('layout.app')

@section('content')
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-4 text-center">Our Products</h2>
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 h-100 position-relative">
                    @if(isset($product->discount) && $product->discount > 0)
                        <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 small fw-bold" style="border-bottom-right-radius: 8px;">
                            {{ $product->discount }}% OFF
                        </div>
                    @endif
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('default.jpg') }}" 
                         class="card-img-top" style="height:220px; object-fit:cover;">
                    <div class="card-body text-center">
                        <h5 class="text-success fw-semibold mb-2">{{ $product->name }}</h5>
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <span class="fw-bold text-success">₹{{ number_format($product->price,2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-warning fw-semibold addToCartBtn me-2"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                <i class="bi bi-cart-plus me-1"></i> Add
                            </button>
                            <a href="{{ route('user.product.detail', $product->id) }}" class="btn btn-success w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-4">No products found</div>
        @endforelse
    </div>
</div>

@include('includes.cart') <!-- Include cart -->
@endsection
