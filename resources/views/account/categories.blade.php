@extends('account.layout.master')

@section('title', 'Categories')

@section('content')
<h2>Categories</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No categories found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
