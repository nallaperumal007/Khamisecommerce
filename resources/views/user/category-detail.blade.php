@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <!-- Left Side: Content -->
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">{{ $category->name }}</h2>
            <p style="font-size:1.1rem; line-height:1.6;">
                {{ $category->description ?? 'No description available.' }}
            </p>
            <a href="{{ route('user.category') }}" class="btn btn-success mt-3">Back to Categories</a>
        </div>

        <!-- Right Side: Image -->
        <div class="col-lg-6 col-md-6 text-center">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" 
                     alt="{{ $category->name }}" 
                     class="img-fluid rounded shadow" 
                     style="max-height:400px; object-fit:cover; width:100%;">
            @else
                <div class="bg-light d-flex justify-content-center align-items-center rounded" 
                     style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
