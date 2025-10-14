@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1>✅ Payment Successful</h1>
    <p>Your order #{{ $order->id }} has been placed successfully.</p>
    <a href="{{ route('men') }}" class="btn btn-primary">Continue Shopping</a>
</div>
@endsection
