@extends('account.layout.master')

@section('title', 'Products')

@section('content')
<h2>Products</h2>
<style>
/* --- Card Hover Animation --- */
.product-card {
    transition: all 0.4s ease;
    border: none;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
}
.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

/* --- Image Section --- */
.product-card img {
    transition: transform 0.5s ease;
}
.product-card:hover img {
    transform: scale(1.05);
}

/* --- Price Badge --- */
.price-badge {
    background: linear-gradient(135deg, #00b09b, #96c93d);
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* --- Gradient Button --- */
.btn-gradient {
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #6610f2, #007bff);
    transform: translateY(-2px);
}

/* --- Category Icon + Text --- */
.category-text {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
}
.category-text i {
    color: #ffb703;
}

/* --- Fallback Image Area --- */
.no-image {
    height: 230px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #adb5bd;
    font-weight: 500;
    font-size: 15px;
    border-bottom: 1px solid #dee2e6;
}
</style>

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card product-card h-100 shadow-sm">

                {{-- Product Image --}}
                @if($product->image)
                    <div class="position-relative">
                        <img src="{{ asset('storage/'.$product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}">
                        <span class="badge price-badge position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill">
                            ₹{{ number_format($product->price, 2) }}
                        </span>
                    </div>
                @else
                    <div class="no-image">
                        <i class="bi bi-image-alt fs-4 me-2"></i> No Image
                    </div>
                @endif

                {{-- Card Body --}}
                <div class="card-body d-flex flex-column p-3">
                    <h5 class="card-title fw-semibold text-dark text-truncate mb-2">
                        {{ $product->name }}
                    </h5>

                    <p class="category-text small mb-2">
                        <i class="bi bi-tag-fill"></i>
                        <span>{{ $product->category->name ?? 'N/A' }}</span>
                    </p>

                    <div class="mt-auto">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" 
                                    class="btn btn-gradient w-100 fw-bold py-2 rounded-3">
                                <i class="bi bi-cart-fill me-2"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted mt-5">No products found.</p>
        </div>
    @endforelse
</div>


<h3>Cart</h3>
@if(session('cart') && count(session('cart')) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $grandTotal = 0; @endphp
        @foreach(session('cart') as $id => $details)
            @php $total = $details['price'] * $details['quantity']; $grandTotal += $total; @endphp
        <tr>
            <td>{{ $details['name'] }}</td>
            <td>
                <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control form-control-sm" style="width:60px;">
                    <button type="submit" class="btn btn-secondary btn-sm ms-1">Update</button>
                </form>
            </td>
            <td>₹{{ number_format($details['price'],2) }}</td>
            <td>₹{{ number_format($total,2) }}</td>
            <td>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
            <td colspan="2"><strong>₹{{ number_format($grandTotal,2) }}</strong></td>
        </tr>
    </tbody>
</table>
<a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Payment</a>
@else
<p>No products in cart.</p>
@endif
@endsection
