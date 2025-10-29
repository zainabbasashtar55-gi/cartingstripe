@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mt-5">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded mb-5" style="margin-top: -90px;"
                    alt="{{ $product->name }}">
            </div>
            <div class="col-md-6 mt-5">
                <h2>{{ $product->name }}</h2>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>

                @if ($product->color)
                    <p><strong>Color:</strong>
                        <span class="badge rounded-pill" style="background-color: {{ $product->color }};">&nbsp;&nbsp;</span>
                        {{ $product->color }}
                    </p>
                @endif

                @if ($product->sizes)
                    <p><strong>Available Sizes:</strong>
                        @foreach (explode(',', $product->sizes) as $size)
                            <span class="badge bg-secondary">{{ $size }}</span>
                        @endforeach
                    </p>
                @endif

                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-success">Add to Cart</a>
            </div>
        </div>
    </div>
@endsection
