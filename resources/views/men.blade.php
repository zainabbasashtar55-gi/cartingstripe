@extends('layouts.app')

<style>
/* Color Palette */
:root {
    --cream: #f5f5dc;
    --beige: #d7ccc8;
    --brown: #6d4c41;
    --dark-brown: #3e2723;
}

/* Background */
body {
    background: linear-gradient(135deg, var(--cream), var(--beige));
    font-family: 'Poppins', sans-serif;
}
 
/* Section Title */
.collection-title {
    font-family: 'Playfair Display', serif;
    font-size: 36px;
    font-weight: 600;
    color: var(--dark-brown);
    text-align: center;
    margin: 50px 0 30px 0;
    position: relative;
    animation: fadeInDown 1s ease;
}

.collection-title::after {
    content: "";
    width: 80px;
    height: 3px;
    background: var(--brown);
    display: block;
    margin: 10px auto 0;
    border-radius: 2px;
}

/* Card Styles */
.card {
    border: none;
    border-radius: 15px;
    background: #fffaf0;
    box-shadow: 0 8px 16px rgba(62, 39, 35, 0.1);
    transition: all 0.4s ease;
    transform: translateY(50px);
    opacity: 0;
}

/* Animate cards on scroll */
.card.show {
    transform: translateY(0);
    opacity: 1;
}

/* Card hover effect */
.card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 12px 24px rgba(62, 39, 35, 0.2);
}

/* Card image */
.card img {
    border-radius: 10px;
    transition: transform 0.5s ease;
}

.card img:hover {
    transform: scale(1.08);
}

/* Buttons */
.btn-custom {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
    background: var(--brown);
   border: 3px solid #2d2626;
    border-radius: 25px;
    padding: 10px 20px;
    width: 150px;
    transition: all 0.3s ease;

}

.btn-custom:hover {
    background: var(--dark-brown);
    box-shadow: 0 0 12px rgba(62, 39, 35, 0.5);
    transform: translateY(-3px);
}

/* Fade animations */
/* @keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-40px); }
    to { opacity: 1; transform: translateY(0); }
} */

   ul {
            font-family: "Poppins", sans-serif;
            list-style-type: none;
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
            margin: 30px 0;
        }

        ul li {
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
            color: #4b4b4b;
        }

        ul li:hover {
            transform: scale(1.1);
            color: #656558;
        }

        ul li::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 0%;
            height: 2px;
            background-color: #656558;
            transition: width 0.3s ease;
        }

        ul li:hover::after {
            width: 100%;
        }

</style>

@section('content')

<div class="container mt-5">
   
    <h1 class="collection-title">Men's Collection</h1>
 @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <a style="color: inherit;text-decoration: none;" href="{{ route('product.details', $product->id) }}">
                <div class="card text-center p-3 h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         style="height: 300px; object-fit: cover; margin: auto;" 
                         class="img-fluid mb-3" 
                         alt="{{ $product->name }}">

                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text mb-4">
                        <small class="text-muted">${{ $product->price }}</small>
                    </p>

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-custom">Add to Cart</a>
                        </div>
                       
                        <a href="{{ route('product.details', $product->id) }}" class="btn btn-custom mt-2">
                            View Details
                        </a>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function revealCards() {
    $(".card").each(function () {
        let position = $(this).offset().top;     
        let scrollTop = $(window).scrollTop();   
        let windowHeight = $(window).height();   

        if (position < scrollTop + windowHeight - 100) {
            $(this).addClass("show");
        }
    });
}

$(document).ready(function () {
    // Run once when page loads
    revealCards();

    // Also run on scroll
    $(window).on("scroll", function () {
        revealCards();
    });
});
</script>



@endsection
