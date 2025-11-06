@extends('layout.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="fw-bold mb-4" style="color:#2c3e50; border-bottom:3px solid #6ab04c; display:inline-block;">Categories</h2>

    <div class="row justify-content-center mt-4">
        @foreach($categories as $cat)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0" style="border-radius:12px; overflow:hidden;">
                    <a href="{{ route('user.category.detail', $cat->id) }}" style="text-decoration:none; color:inherit;">
                        @if($cat->image)
                            <img src="{{ asset('storage/' . $cat->image) }}" class="card-img-top" alt="{{ $cat->name }}" style="height:250px; object-fit:cover;">
                        @else
                            <img src="{{ asset('default.jpg') }}" class="card-img-top" alt="No Image" style="height:250px; object-fit:cover;">
                        @endif
                        <div class="card-body bg-light text-center">
                            <h5 class="fw-bold text-uppercase mb-0" style="color:#34495e;">{{ $cat->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
