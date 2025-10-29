@extends('account.layout.master')

@section('title', 'Products')

@section('content')
<style>
/* ===== Global Styles ===== */
body {
    background: linear-gradient(135deg, #f8f9fc, #eef1f7);
    font-family: 'Poppins', sans-serif;
    color: #2c3e50;
}

h2, h3 {
    font-weight: 600;
    margin-bottom: 25px;
    color: #2c3e50;
}

/* ===== Product Section ===== */
.product-card {
    border: none;
    background: rgba(255, 255, 255, 0.85);
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    backdrop-filter: blur(10px);
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(78, 115, 223, 0.25);
}

.product-card img {
    transition: transform 0.5s ease;
    border-bottom: 1px solid #f1f1f1;
}

.product-card:hover img {
    transform: scale(1.05);
}

.price-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, #00b09b, #96c93d);
    color: #fff;
    font-weight: 600;
    border-radius: 30px;
    padding: 6px 14px;
    font-size: 0.9rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

.category-text {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #6c757d;
    font-size: 0.9rem;
}

.category-text i {
    color: #ffb703;
}

.no-image {
    height: 230px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #adb5bd;
    font-weight: 500;
    font-size: 15px;
}

.btn-gradient {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
    border-radius: 12px;
    font-weight: 500;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #6f42c1, #4e73df);
    transform: translateY(-2px);
}

/* ===== Cart Section ===== */
.cart-wrapper {
    margin-top: 60px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    backdrop-filter: blur(10px);
}

.cart-table {
    width: 100%;
    border-collapse: collapse;
}

.cart-table thead {
    background: linear-gradient(135deg, #eef1fb, #f8f9fc);
    color: #495057;
    font-weight: 600;
}

.cart-table th, .cart-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}

.cart-table tr:hover {
    background: rgba(78, 115, 223, 0.05);
    transition: background 0.3s ease;
}

.cart-table input[type="number"] {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 4px 6px;
    text-align: center;
    width: 70px;
}

.btn-sm {
    border-radius: 8px;
    font-weight: 500;
}

/* ===== Total Row ===== */
.total-row td {
    background: linear-gradient(135deg, #f8f9fc, #eef1fb);
    font-size: 1.1rem;
    font-weight: 600;
}

.grand-total {
    color: #4e73df;
    font-weight: 700;
    font-size: 1.25rem;
}

/* ===== CTA Button ===== */
.btn-checkout {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: #fff;
    padding: 12px 28px;
    border-radius: 40px;
    font-size: 1rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
}

.btn-checkout:hover {
    transform: translateY(-2px);
    background: linear-gradient(135deg, #6f42c1, #4e73df);
}

/* ===== Empty Cart ===== */
.empty-cart {
    text-align: center;
    padding: 80px 20px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    margin-top: 30px;
}

.empty-cart .icon {
    font-size: 3rem;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.empty-cart p {
    color: #6c757d;
    font-size: 1rem;
}
</style>

<!-- ===== Products Section ===== -->
<h2>🛍️ Products</h2>
<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card product-card h-100">

                {{-- Product Image --}}
                @if($product->image)
                    <div class="position-relative">
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <span class="price-badge">
                            ₹{{ number_format($product->price, 2) }}
                        </span>
                    </div>
                @else
                    <div class="no-image">
                        <i class="bi bi-image-alt fs-4 me-2"></i> No Image
                    </div>
                @endif

                {{-- Product Info --}}
                <div class="card-body d-flex flex-column p-3">
                    <h5 class="card-title fw-semibold text-truncate mb-2">{{ $product->name }}</h5>
                    <p class="category-text mb-3"><i class="bi bi-tag-fill"></i>{{ $product->category->name ?? 'N/A' }}</p>
                    <div class="mt-auto">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-gradient w-100 py-2">
                                <i class="bi bi-cart-fill me-2"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="empty-cart">
                <div class="icon">📭</div>
                <h5>No products found</h5>
                <p>Check back later or explore new categories.</p>
            </div>
        </div>
    @endforelse
</div>

<!-- ===== Cart Section ===== -->
<div class="cart-wrapper mt-5">
    <h3>🧺 Your Cart</h3>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="cart-table">
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
                    @php 
                        $total = $details['price'] * $details['quantity'];
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-secondary ms-2">Update</button>
                            </form>
                        </td>
                        <td>₹{{ number_format($details['price'], 2) }}</td>
                        <td>₹{{ number_format($total, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3" class="text-end">Grand Total:</td>
                    <td colspan="2" class="grand-total">₹{{ number_format($grandTotal, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="text-end mt-4">
            <a href="{{ route('checkout') }}" class="btn-checkout">
                Proceed to Payment <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    @else
        <div class="empty-cart">
            <div class="icon">🛒</div>
            <h5>Your cart is empty</h5>
            <p>Add some products to get started!</p>
        </div>
    @endif
</div>
@endsection
