@extends('admin.layout.master')

@section('title', 'Orders List')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fc;
        color: #2c3e50;
    }
    .table-container {
        background: linear-gradient(135deg, #f8f9fa, #eef1f7);
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        padding: 30px;
        animation: fadeIn 0.8s ease;
        margin: 40px auto;
    }
    h2 {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th {
        background-color: #4e73df;
        color: #fff;
        padding: 12px;
        text-align: left;
        font-weight: 500;
    }
    .table td {
        padding: 12px;
        vertical-align: top;
        border-bottom: 1px solid #dee2e6;
    }
    .badge {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: 0.85rem;
    }
    .order-items {
        background-color: #f8f9fc;
        border-radius: 8px;
        padding: 10px;
        font-size: 0.9rem;
    }
    .order-items li {
        list-style: none;
        border-bottom: 1px solid #e9ecef;
        padding: 6px 0;
    }
    .order-items li:last-child {
        border-bottom: none;
    }
    .text-muted {
        font-size: 0.85rem;
    }
</style>

<div class="table-container">
    <h2>🛒 Customer Orders</h2>

    @if($orders->isEmpty())
        <div class="alert alert-warning text-center">No orders found.</div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Info</th>
                        <th>Shipping Address</th>
                        <th>Items Ordered</th>
                        <th>Total (₹)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            <strong>{{ $order->recipient_name }}</strong><br>
                            <span class="text-muted"><i class="bi bi-telephone"></i> {{ $order->phone_number }}</span><br>
                            <span class="text-muted"><i class="bi bi-envelope"></i> {{ $order->email_address }}</span>
                        </td>

                        <td>
                            {{ $order->address_line1 }}<br>
                            {{ $order->address_line2 ? $order->address_line2 . ',' : '' }} 
                            {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}<br>
                            <span class="badge">{{ $order->country }}</span>
                        </td>

                        <td>
                            @php $items = json_decode($order->cart_items, true); @endphp
                            <ul class="order-items">
                                @foreach($items as $item)
                                    <li>
                                        <strong>{{ $item['name'] }}</strong><br>
                                        ₹{{ number_format($item['price'],2) }} × {{ $item['quantity'] }}
                                        <span class="text-muted float-end">₹{{ number_format($item['total'],2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>

                        <td><strong>₹{{ number_format($order->total, 2) }}</strong></td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
