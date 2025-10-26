@extends('admin.layouts.app')

@section('title', 'Orders List')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Orders List</h2>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total Amount (₹)</th>
                <th>Status</th>
                <th>Created At</th>
                <th width="120">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        @if($order->status == 'Pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($order->status == 'Completed')
                            <span class="badge bg-success">Completed</span>
                        @elseif($order->status == 'Cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                        @else
                            <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d M Y h:i A') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
