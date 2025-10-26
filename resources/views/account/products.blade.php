@extends('account.layout.master')

@section('title', 'Products')

@section('content')
<h2>Products</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $key => $product)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="60" height="60" style="object-fit:cover">
                @else
                    <span>No Image</span>
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>₹{{ number_format($product->price,2) }}</td>
            <td>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No products found.</td></tr>
        @endforelse
    </tbody>
</table>

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
