@extends('layouts.app')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container mt-5">
    <h1 class="collection-title">Your Shopping Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row fade-in">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Items in Cart</div>
                <div class="card-body">
                    @if(session('cart') && count(session('cart')) > 0)
                        <ul class="list-group">
                            @foreach(session('cart') as $key => $value)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $value['image']) }}" 
                                             alt="{{ $value['name'] }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                        <div>
                                            <strong>{{ $value['name'] }}</strong><br>
                                            ${{ $value['price'] }} ({{ $value['quantity'] }}) <br>
                                            <strong>Total: ${{ $value['price'] * $value['quantity'] }}</strong>
                                        </div>
                                    </div>

                                    <form action="{{ route('remove.from.cart', $key) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                        @php $total = 0; @endphp
                        @foreach(session('cart') as $key => $value)
                            @php $total += $value['price'] * $value['quantity']; @endphp
                        @endforeach

                        <h4 class="mt-3">Total Amount: ${{ $total }}</h4>

                        <form action="{{ route('order') }}" method="POST">
                            @csrf
                            <button class="btn form-control" style="justify-content: center; background-color: #707070; color: white;">
                                Proceed to Checkout
                            </button>
                        </form>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
