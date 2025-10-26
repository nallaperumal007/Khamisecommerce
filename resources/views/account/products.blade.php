@extends('account.layout.master')

@section('title', 'Products')

@section('content')
<h2>Products</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $key => $product)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>₹{{ number_format($product->price,2) }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No products found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
