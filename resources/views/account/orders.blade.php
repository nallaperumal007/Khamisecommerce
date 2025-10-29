@extends('account.layout.master')

@section('title', 'My Orders')

@section('content')
<style>
    /* ===== Global Styles ===== */
    body {
        background: linear-gradient(135deg, #f8f9fc, #eef1fb);
        font-family: 'Poppins', sans-serif;
    }

    .orders-container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 20px;
        animation: fadeIn 0.8s ease-in-out;
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .page-header span.icon {
        font-size: 1.8rem;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* ===== Order Grid ===== */
    .orders-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
    }

    .order-card {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .order-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(78, 115, 223, 0.15);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .order-id {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1rem;
    }

    .order-date {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .order-body {
        margin-top: 10px;
    }

    .product-name {
        font-size: 1.1rem;
        font-weight: 500;
        color: #4e73df;
        margin-bottom: 6px;
    }

    .order-details {
        color: #5a5c69;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    .order-total {
        font-size: 1.2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-top: 10px;
    }

    /* ===== Status Badge ===== */
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #fff;
        text-transform: capitalize;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }

    .status-completed { background: linear-gradient(135deg, #1cc88a, #17a673); }
    .status-pending { background: linear-gradient(135deg, #f6c23e, #f1b931); }
    .status-cancelled { background: linear-gradient(135deg, #e74a3b, #be2617); }

    /* ===== Empty State ===== */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(10px);
        margin-top: 60px;
    }

    .empty-state .icon {
        font-size: 3rem;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 15px;
    }

    .empty-state h5 {
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #6c757d;
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    .empty-state .btn-shop {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border: none;
        padding: 10px 22px;
        border-radius: 30px;
        font-size: 0.95rem;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .empty-state .btn-shop:hover {
        background: linear-gradient(135deg, #6f42c1, #4e73df);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="orders-container">
    <div class="page-header">
        <h2><span class="icon">🛍️</span> My Orders</h2>
    </div>

    <div class="orders-grid">
        @forelse($orders as $order)
            <div class="order-card">
                <div class="order-header">
                    <div class="order-id">Order #{{ $order->id }}</div>
                    <div class="order-date">{{ $order->created_at->format('M d, Y') }}</div>
                </div>

                <div class="order-body">
                    <div class="product-name">{{ $order->product->name ?? 'Product N/A' }}</div>
                    <div class="order-details">Quantity: {{ $order->quantity ?? 1 }}</div>
                    <div class="order-details">Price: ₹{{ number_format($order->total_price, 2) }}</div>

                    <div class="status-badge
                        @if($order->status == 'Completed') status-completed
                        @elseif($order->status == 'Pending') status-pending
                        @else status-cancelled @endif">
                        {{ $order->status }}
                    </div>

                    <div class="order-total">Total: ₹{{ number_format($order->total_price, 2) }}</div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="icon">📦</div>
                <h5>No orders found</h5>
                <p>Looks like you haven’t placed any orders yet.</p>
                <button class="btn-shop">Shop Now</button>
            </div>
        @endforelse
    </div>
</div>
@endsection
