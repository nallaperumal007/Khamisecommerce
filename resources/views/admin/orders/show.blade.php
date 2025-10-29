@extends('admin.layouts.master')

@section('title', 'Order Details')

@section('content')
<style>
    body {
        background: #f4f6f9;
        font-family: 'Poppins', sans-serif;
    }

    .order-card {
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        background: #fff;
        transition: transform 0.2s ease-in-out;
    }

    .order-card:hover {
        transform: translateY(-3px);
    }

    .order-header {
        background: linear-gradient(135deg, #283e51, #485563);
        color: #fff;
        padding: 1.2rem 1.5rem;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .order-header h5 {
        font-weight: 600;
        margin: 0;
    }

    .order-body {
        padding: 1.8rem;
    }

    h6 {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.75rem;
    }

    p {
        margin-bottom: 0.4rem;
        color: #555;
    }

    .highlight-card {
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        padding: 1rem;
        border-radius: 10px;
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.05);
    }

    .badge {
        padding: 0.5em 0.9em;
        font-size: 0.85rem;
        border-radius: 8px;
        font-weight: 500;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .badge.bg-warning {
        background: #fff4cc !important;
        color: #8a6d3b !important;
    }

    .badge.bg-warning:hover {
        background: #ffe88c !important;
    }

    .badge.bg-success {
        background: #d4edda !important;
        color: #155724 !important;
    }

    .badge.bg-success:hover {
        background: #bde5c8 !important;
    }

    .badge.bg-danger {
        background: #f8d7da !important;
        color: #721c24 !important;
    }

    .badge.bg-danger:hover {
        background: #f1b0b7 !important;
    }

    .back-btn {
        display: inline-block;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff !important;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(118, 75, 162, 0.3);
    }

    .back-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(118, 75, 162, 0.4);
    }

    @media (max-width: 768px) {
        .order-body .row {
            flex-direction: column;
        }
    }
</style>

<div class="container py-5">
    <a href="{{ route('admin.orders.index') }}" class="back-btn mb-4">← Back to Orders</a>

    <div class="order-card">
        <div class="order-header">
            <h5>Order Details - #{{ $order->order_number }}</h5>
        </div>
        <div class="order-body">
            <div class="row g-4 mb-3">
                <div class="col-md-6">
                    <h6>Customer Information</h6>
                    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Order Information</h6>
                    <div class="highlight-card mb-3">
                        <p><strong>Total Amount:</strong> ₹{{ number_format($order->total_amount, 2) }}</p>
                        <p><strong>Status:</strong>
                            @if($order->status == 'Pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'Completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($order->status == 'Cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">{{ $order->status }}</span>
                            @endif
                        </p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
