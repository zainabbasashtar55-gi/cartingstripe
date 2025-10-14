@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded mb-5" style="margin-top: -90px;" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6 mt-5">
            <h2>{{ $product->name }}</h2>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
