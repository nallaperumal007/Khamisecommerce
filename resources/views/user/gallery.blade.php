@extends('layout.app')

@section('content')
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-3">Gallery</h2>
    <div class="row g-3">
        @for ($i = 1; $i <= 6; $i++)
        <div class="col-md-4">
            <img src="https://picsum.photos/400?random={{ $i }}" class="img-fluid rounded shadow-sm" alt="Gallery Image">
        </div>
        @endfor
    </div>
</div>
@endsection
