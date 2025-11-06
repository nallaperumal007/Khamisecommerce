@extends('layout.app')

@section('content')
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-4 text-center">Our Products</h2>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('user.product.detail', $product->id) }}" 
                   class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0 h-100 position-relative" 
                         style="border-radius: 12px; overflow: hidden; transition: all 0.3s ease;">
                         
                        <!-- Discount badge -->
                        @if(isset($product->discount) && $product->discount > 0)
                            <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 small fw-bold" 
                                 style="border-bottom-right-radius: 8px;">
                                {{ $product->discount }}% OFF
                            </div>
                        @endif

                        <!-- Product image -->
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="card-img-top"
                                 style="height: 220px; object-fit: cover; background: #fff;">
                        @else
                            <img src="{{ asset('default.jpg') }}" 
                                 alt="No Image" 
                                 class="card-img-top"
                                 style="height: 220px; object-fit: cover; background: #f8f9fa;">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title text-success fw-semibold mb-2">{{ $product->name }}</h5>

                            <div class="d-flex justify-content-center align-items-center mb-2">
                                @if(isset($product->old_price))
                                    <span class="text-muted text-decoration-line-through me-2">
                                        ₹{{ number_format($product->old_price, 2) }}
                                    </span>
                                @else
                                    <span class="text-muted text-decoration-line-through me-2">
                                        ₹{{ number_format($product->price + 10, 2) }}
                                    </span>
                                @endif
                                <span class="fw-bold text-success">
                                    ₹{{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <button class="btn w-100 text-white fw-semibold" 
                                    style="background-color:#4b752a; border-radius: 20px;">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-4">
                No products found
            </div>
        @endforelse
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-6px);
        transition: all 0.3s ease;
        box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }
</style>
@endsection
