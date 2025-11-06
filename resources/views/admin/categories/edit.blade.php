@extends('admin.layout.master')

@section('title', 'Edit Category')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    body { font-family: 'Poppins', sans-serif; background: #f8f9fc; color: #2c3e50; }
    .form-container {
        background: linear-gradient(135deg, #f8f9fa, #eef1f7);
        border-radius: 12px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        padding: 30px; max-width: 650px; margin: 40px auto; animation: fadeIn 0.8s ease;
    }
    .form-container h2 { font-weight: 600; color: #2c3e50; margin-bottom: 1.5rem; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
    .form-control {
        border-radius: 8px; border: 1px solid #d1d3e2; padding: 10px 14px; font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    .form-control:focus { border-color: #4e73df; box-shadow: 0 0 5px rgba(78, 115, 223, 0.3); }
    .btn-gradient-primary {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none; color: #fff; font-weight: 500; border-radius: 8px;
        padding: 10px 20px; transition: all 0.3s ease;
    }
    .btn-gradient-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(78,115,223,0.3); }
    .btn-back {
        background-color: #e9ecef; color: #2c3e50; font-weight: 500; border-radius: 8px;
        padding: 10px 20px; transition: all 0.3s ease;
    }
    .btn-back:hover { background-color: #d6d8db; transform: translateY(-2px); }
    .img-preview {
        max-width: 100%; border-radius: 10px; margin-top: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
</style>

<div class="form-container">
    <h2>✏️ Edit Category</h2>

    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <strong>⚠ Oops!</strong> Please fix the following errors:
            <ul class="mt-2 mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" class="img-preview" id="imagePreview">
            @else
                <img id="imagePreview" class="img-preview" style="display:none;">
            @endif
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-gradient-primary">💾 Update</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-back">← Back</a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    const imageField = document.getElementById("imagePreview");
    reader.onload = () => {
        imageField.src = reader.result;
        imageField.style.display = "block";
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
