@extends('layout.app')

@section('content')
<div class="container py-5">

    {{-- ✅ Category Info Section --}}
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">{{ $category->name }}</h2>
            <p style="font-size:1.1rem; line-height:1.6;">
                {{ $category->description ?? 'No description available.' }}
            </p>
            <a href="{{ route('user.category') }}" class="btn btn-success mt-3">Back to Categories</a>
        </div>

        <div class="col-lg-6 col-md-6 text-center">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" 
                     alt="{{ $category->name }}" 
                     class="img-fluid rounded shadow" 
                     style="max-height:400px; object-fit:cover; width:100%;">
            @else
                <div class="bg-light d-flex justify-content-center align-items-center rounded" 
                     style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif
        </div>
    </div>

    {{-- ✅ Products Section --}}
    <h3 class="fw-bold mb-4 text-center">Products in {{ $category->name }}</h3>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top" 
                             style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $product->name }}</h5>
                            <p class="text-muted mb-1">₹{{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('user.product.detail', $product->id) }}" class="btn btn-outline-success btn-sm mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">No products available in this category.</p>
    @endif

</div>
@endsection
