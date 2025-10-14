@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1>❌ Payment Cancelled</h1>
    <p>Your payment was cancelled. You can try again.</p>
    <a href="{{ route('cart') }}" class="btn btn-warning">Back to Cart</a>
</div>
@endsection
