@extends('account.layout.master')

@section('title', 'My Orders')

@section('content')
<h2>My Orders</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price (₹)</th>
            <th>Status</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $key => $order)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product->name ?? '-' }}</td>
            <td>{{ $order->quantity ?? 1 }}</td>
            <td>₹{{ number_format($order->total_price ?? 0, 2) }}</td>
            <td>{{ $order->status ?? 'Pending' }}</td>
            <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No orders found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
