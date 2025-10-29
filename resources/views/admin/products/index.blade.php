@extends('admin.layout.master')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fc;
    }

    h2 {
        font-weight: 600;
        color: #333;
    }

    /* Add Product Button */
    .btn-primary {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(78, 115, 223, 0.4);
    }

    /* Success Alert */
    .alert {
        border-radius: 10px;
        font-weight: 500;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    /* Table Styling */
    .table-container {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        overflow-x: auto;
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 0.5rem;
        width: 100%;
    }

    .table thead {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border-radius: 10px;
    }

    .table thead th {
        font-weight: 600;
        padding: 1rem;
        border: none;
        white-space: nowrap;
    }

    .table tbody tr {
        background: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fc;
    }

    .table tbody tr:hover {
        transform: scale(1.01);
        background-color: #eef1fb;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
        padding: 0.9rem;
        border: none;
    }

    /* Product Image */
    img {
        border-radius: 10px;
        object-fit: cover;
        width: 60px;
        height: 60px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    img:hover {
        transform: scale(1.05);
    }

    /* Buttons */
    .btn-warning {
        background-color: #f6c23e;
        color: #fff;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-warning:hover {
        background-color: #dda20a;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #e74a3b;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    /* Responsive Scroll */
    @media (max-width: 768px) {
        .table-container {
            padding: 1rem;
        }
        .table thead {
            font-size: 0.9rem;
        }
        .table td {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container mt-4">
    <h2 class="mb-3">Products List</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Add New Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $key => $product)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td><span class="badge bg-light text-dark px-3 py-2" style="border-radius:8px;">{{ $product->category->name ?? 'N/A' }}</span></td>
                    <td><span class="badge bg-primary-subtle text-primary px-3 py-2" style="border-radius:8px;">₹{{ number_format($product->price, 2) }}</span></td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No products found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
