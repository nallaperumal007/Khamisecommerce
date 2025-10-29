@extends('admin.layout.master')

@section('title', 'Categories')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fc;
        color: #2c3e50;
    }

    /* ====== Page Header ====== */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .page-header h2 {
        font-weight: 600;
        color: #2c3e50;
    }

    /* ====== Add Button ====== */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(78, 115, 223, 0.3);
    }

    /* ====== Table Container ====== */
    .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ====== Table ====== */
    table {
        width: 100%;
        margin: 0;
    }

    thead {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
    }

    thead th {
        font-weight: 600;
        padding: 14px 16px;
        border: none !important;
    }

    tbody tr {
        transition: background-color 0.2s ease;
    }

    tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }

    tbody td {
        padding: 12px 16px;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    /* ====== Action Buttons ====== */
    .btn-warning {
        background: linear-gradient(135deg, #f6c23e, #f1a208);
        border: none;
        border-radius: 6px;
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(241, 162, 8, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, #e74a3b, #c0392b);
        border: none;
        border-radius: 6px;
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
    }

    /* ====== Alerts ====== */
    .alert {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.8s ease;
    }

    /* ====== Responsive ====== */
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }
        .btn {
            margin-bottom: 6px;
        }
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>

<div class="container mt-4">

    <div class="page-header">
        <h2 class="mb-0">📦 Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient-primary">+ Add Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-3">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
