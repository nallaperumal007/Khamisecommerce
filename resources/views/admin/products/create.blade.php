@extends('admin.layout.master')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold text-dark mb-0" style="font-family: 'Poppins', sans-serif;">🛍️ Add New Product</h2>
        <a href="{{ route('admin.products.index') }}" 
           class="btn btn-light border shadow-sm rounded-3 px-4 py-2 fw-medium" 
           style="transition: all 0.3s;">
            ← Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-3 p-4 mb-4">
            <strong>⚠️ Please fix the following errors:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li class="ms-3">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5" 
         style="background: #ffffff; transition: all 0.3s ease;">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label class="form-label fw-semibold" style="color:#333;">Product Name <span class="text-danger">*</span></label>
                <input type="text" name="name" 
                       class="form-control shadow-sm rounded-3" 
                       placeholder="Enter product name" required
                       style="padding: 12px; border: 1px solid #ced4da; transition: 0.3s;">
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label class="form-label fw-semibold" style="color:#333;">Select Category <span class="text-danger">*</span></label>
                <select name="category_id" 
                        class="form-select shadow-sm rounded-3" 
                        required style="padding: 12px;">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label class="form-label fw-semibold" style="color:#333;">Price (₹) <span class="text-danger">*</span></label>
                <input type="number" name="price" 
                       class="form-control shadow-sm rounded-3" 
                       step="0.01" placeholder="Enter price" required
                       style="padding: 12px;">
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label class="form-label fw-semibold" style="color:#333;">Product Image</label>
                <input type="file" name="image" 
                       class="form-control shadow-sm rounded-3" 
                       accept="image/*" id="imageInput" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="preview" 
                         src="#" 
                         alt="Image Preview" 
                         style="display:none; max-height: 150px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.products.index') }}" 
                   class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-medium" 
                   style="transition: all 0.3s;">Cancel</a>
                <button type="submit" 
                        class="btn px-5 py-2 text-white fw-medium rounded-3" 
                        style="background: linear-gradient(135deg, #4e73df, #6f42c1); box-shadow: 0 4px 15px rgba(78,115,223,0.4); transition: all 0.3s;">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if (file) {
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(file);
    } else {
        preview.style.display = 'none';
    }
}
</script>

<style>
    body {
        background-color: #f8f9fc;
        font-family: 'Poppins', sans-serif;
    }

    input:focus, select:focus {
        border-color: #4e73df !important;
        box-shadow: 0 0 0 0.25rem rgba(78,115,223,0.25) !important;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection
