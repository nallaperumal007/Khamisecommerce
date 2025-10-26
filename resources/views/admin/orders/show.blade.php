@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mb-3">← Back to Orders</a>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Order Details - #{{ $order->order_number }}</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6>Customer Information</h6>
                    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Order Info</h6>
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
@endsection
