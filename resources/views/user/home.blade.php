@extends('layout.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    {{-- Indicators --}}
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    </div>

    {{-- Carousel Images --}}
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('storage/1.jpeg') }}" class="d-block w-100" alt="Slide 1" style="height: 100vh; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/2.jpg') }}" class="d-block w-100" alt="Slide 2" style="height: 100vh; object-fit: cover;">
        </div>
    </div>

    {{-- Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endsection
