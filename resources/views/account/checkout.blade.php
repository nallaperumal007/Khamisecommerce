@extends('account.layout.master')

@section('title', 'Checkout')

@section('content')
<h2>Checkout</h2>
@if(session('cart') && count(session('cart')) > 0)
<ul>
    @php $grandTotal = 0; @endphp
    @foreach(session('cart') as $id => $details)
        @php $total = $details['price'] * $details['quantity']; $grandTotal += $total; @endphp
        <li>{{ $details['name'] }} - {{ $details['quantity'] }} x ₹{{ $details['price'] }} = ₹{{ $total }}</li>
    @endforeach
</ul>
<h3>Total: ₹{{ number_format($grandTotal,2) }}</h3>
<a href="#" class="btn btn-success">Pay Now</a>
@else
<p>No products in cart.</p>
@endif
@endsection
