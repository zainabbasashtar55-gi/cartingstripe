@extends('layouts.app')

@section('content')
    <style>
        @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap');




        .row {
            font-family: 'Lato', sans-serif;
        }

        .text-center {
            text-align: center;
        }

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

        .collection-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #f9f9f9;

        }

        .collection-title {
            font-family: 'poppins', serif;
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #222;
            margin-top: 80px;
        }

        .collection-title2 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #393939;
            text-align: center;
            margin-top: 30px;
        }

        .collection-text {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.7;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #f9f9f9c8;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .card-title {
            font-weight: 600;
            font-size: 20px;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        .card-text {
            font-size: 16px;
            color: #666;
            font-family: 'Poppins', sans-serif;
        }

        .btn-dark {
            color: #000000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            background: #ebebeb;
            margin-bottom: -30px;
            font-size: 19px;
            transition: background-color 0.3s ease;
            font-family: 'Roboto';
        }

        /* Footer Styling */
        .main-footer {
            background-color: #e4e4e4;
            /* Light gray background */
            padding: 60px 20px 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
            /* Allows columns to wrap on smaller screens */
            gap: 30px;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
            /* Prevents columns from getting too narrow */
        }

        .footer-column h4 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-column p,
        .footer-column a {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.6;
            text-decoration: none;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column a:hover {
            text-decoration: underline;
        }

        .social-icons img {
            width: 24px;
            height: 24px;
            margin-right: 15px;
        }

        /* Copyright Section */
        .copyright {
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 40px;
            padding-top: 20px;
        }
    </style>


    <div class="collection-section" style="height: 470px;">
        <h2 class="collection-title">OLD MONEY OUTFITS</h2>
        <p class="collection-text">
            Old money outfits embody timeless elegance and understated sophistication. Characterized by neutral tones,
            tailored silhouettes, and high-quality fabrics, this style avoids flashy logos or loud trends. Instead, it
            focuses on classic pieces like blazers, trench coats, and loafers, often accessorized with pearls or leather
            goods. The overall look is polished and refined, reflecting a sense of heritage and tradition.
        </p>
    </div>

    <div class="container mt-5">

        <h1 class="collection-title" style="text-align: center">Premium Articles</h1>
        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession

        <div class="row">

            @foreach ($firstProducts as $product)
                <div class="col-md-4 mb-4">
                    <a style="color: inherit;text-decoration: none;" href="{{ route('product.details', $product->id) }}">
                        <div class="card text-center p-3 h-100">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                style="height: 300px; object-fit: cover; margin: auto;" class="img-fluid mb-3"
                                alt="{{ $product->name }}">

                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text mb-4">
                                <small class="text-muted">${{ $product->price }}</small>
                            </p>

                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <a href="{{ route('add.to.cart', $product->id) }}"
                                        style="display:inline-block;width:100%;text-align:center;
                   background:linear-gradient(135deg,#8a8a8a,#8a8a8a);
                   color:#ffffff;border:none;border-radius:50px;
                   padding:10px 20px;font-weight:600;
                   font-family:'Poppins',sans-serif;
                   letter-spacing:0.3px;text-decoration:none;
                   box-shadow:0 4px 10px rgba(90,61,54,0.25);
                   transition:all 0.3s ease;"
                                        onmouseover="this.style.background='linear-gradient(135deg,#5a3d36,#3e2723)';this.style.boxShadow='0 6px 15px rgba(62,39,35,0.35)';this.style.transform='translateY(-2px) scale(1.02)'"
                                        onmouseout="this.style.background='linear-gradient(135deg,#7b5e57,#5a3d36)';this.style.boxShadow='0 4px 10px rgba(90,61,54,0.25)';this.style.transform='none'">
                                        Add to Cart
                                    </a>
                                </div>

                                <a href="{{ route('product.details', $product->id) }}"
                                    style="display:inline-block;width:100%;text-align:center;
               background:transparent;color:#534e4c;
               border:2px solid #534e4c;border-radius:50px;
               padding:10px 20px;font-weight:600;
               font-family:'Poppins',sans-serif;
               letter-spacing:0.3px;text-decoration:none;
               transition:all 0.3s ease;"
                                    onmouseover="this.style.background='#5a3d36';this.style.color='#fff';this.style.boxShadow='0 6px 15px rgba(62,39,35,0.35)';this.style.transform='translateY(-2px) scale(1.03)'"
                                    onmouseout="this.style.background='transparent';this.style.color='#5a3d36';this.style.boxShadow='none';this.style.transform='none'">
                                    View Details
                                </a>
                            </div>

                    </a>
                </div>
        </div>
        @endforeach
    </div>
    </div>

    <!-- OUR NEW COLLECTION -->
    <div class="container mt-5 mb-5">
        <h2 class="collection-title2">OUR NEW COLLECTION</h2>
        <div class="row">
            @foreach ($secondProducts as $product)
                <div class="col-md-4">
                    <div class="card text-center p-3" style="width: 350px;">
                        <div class="card-header">
                            <img src="{{ asset('storage/' . $product->image) }}" style="height: 300px;"
                                class="img-fluid mb-3" alt="Product 1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text mb-4">
                                {{ $product->description }}
                            </p>
                            <button type="button" class="btn btn-dark discover-btn" data-bs-toggle="modal"
                                data-bs-target="#productModal" data-title="{{ $product->name }}"
                                data-description="{{ $product->description }}" data-id="{{ $product->id }}"
                                data-image="{{ asset('storage/' . $product->image) }}" data-price="${{ $product->price }}"
                                data-colors="Available Colors">
                                Discover Now
                            </button>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>





    <!-- WINTER COLLECTION / ABOUT OUR BRAND -->
    <div class="container my-5 mt-5">
        <div class="row align-items-center mt-4">
            <h1
                style="text-align: center;font-family: 'Playfair Display', serif;font-weight: 500;color: #211b13;margin-top: 50px;">
                OUR BRAND</h1>
            <div class="col-md-6">
                <img src="images/download1.jpg " alt="Winter Collection" class="img-fluid rounded w-75">
            </div>
            <div class="col-md-6">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 36px; font-weight: 600; color: #222;">
                    About Our Brand
                </h2>
                <p
                    style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 300; line-height: 1.7; color: #666;">
                    At Zipper, we believe in timeless elegance and quality craftsmanship. Our collections are designed for
                    those who appreciate classic styles with a modern twist. We are committed to sustainability and ethical
                    practices, ensuring that every piece we create not only looks good but also feels good to wear. Join us
                    on our journey to redefine fashion with integrity and style.
                </p>
                <button class="btn"
                    style="background-color: #211b13; color: white;width: 200px;margin-top: 30px;font-family: 'Roboto', sans-serif;">SHOP
                    COLLECTION</button>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <h2 class="collection-title2">OUR BEST SELLING ARTICLES</h2>
        <div class="row g-4 justify-content-center">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header">
                        <img src="images/best1.png" style="height: 300px; margin-left: 3   5px;" class="img-fluid mb-3"
                            alt="Product 1">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OVERSIZE BOMBER JACKET</h5>
                        <p class="card-text mb-4">
                            A classic bomber jacket with a modern oversized fit, made from durable nylon with ribbed cuffs
                            and hem.
                        </p>

                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header">
                        <img src="images/best4.png" style="height: 300px; margin-left: 3   5px;" class="img-fluid mb-3"
                            alt="Product 2">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">The Knit Polo</h5>
                        <p class="card-text mb-4">
                            A short-sleeved polo shirt crafted from fine cotton or lightweight wool, featuring a soft collar
                            and button.
                        </p>

                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header d-flex justify-content-center " style="height: 340px;">
                        <img src="images/best2.png" class="img-fluid" alt="Product 3" style="max-height: 100%; ">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">PILOT LEATHER JACKET</h5>
                        <p class="card-text mb-4">
                            A classic pilot jacket made from premium leather, featuring a zip closure and multiple pockets.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-column company-info">
                <h4>ZIPPER</h4>
                <p>
                    Dignissim lacus, turpis ut suspendisse vel tellus. Turpis purus, gravida orci, fringilla a. Ac sed eu
                    fringilla odio mi.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-twitter"
                            style="font-size: 24px; color: #1DA1F2; margin-right: 15px;"></i></a>
                    <a href="#"><i class="fab fa-youtube"
                            style="font-size: 24px; color: #FF0000; margin-right: 15px;"></i></a>
                    <a href="#"><i class="fab fa-instagram"
                            style="font-size: 24px; color: #E1306C; margin-right: 15px;"></i></a>
                    <a href="#"><i class="fab fa-pinterest"
                            style="font-size: 24px; color: #BD081C; margin-right: 15px;"></i></a>

                </div>
            </div>

            <div class="footer-column">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>HELP & INFO</h4>
                <ul>
                    <li><a href="#">TRACK YOUR ORDER</a></li>
                    <li><a href="#">SHIPPING + DELIVERY</a></li>
                    <li><a href="#">CONTACT US</a></li>
                    <li><a href="#">FAQS</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>CONTACT US</h4>
                <p>
                    Do you have any questions or suggestions?
                    <a href="mailto:contact@yourcompany.com">contact@yourcompany.com</a>
                </p>
                <p>
                    Do you need support? Give us a call.
                    <a href="tel:+43720115278">+43 720 11 52 78</a>
                </p>
            </div>
        </div>


    </footer>
@endsection

<!-- Modal -->
<div class="modal fade" id="product1Modal" tabindex="-1" aria-labelledby="product1ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="product1ModalLabel">The Oxford Classic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row">
                <div class="col-md-6">
                    <img src="images/product1.png" class="img-fluid rounded" alt="Product 1">
                </div>
                <div class="col-md-6">
                    <p><strong>Description:</strong> A timeless button-down shirt made from premium cotton, featuring a
                        tailored fit and classic collar.</p>
                    <p><strong>Available Colors:</strong> White, Blue, Black</p>
                    <p><strong>Price:</strong> $49.99</p>
                    <button class="btn btn-dark">Add to Cart</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true"
    style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"
            style="border-radius: 18px; overflow: hidden; background: linear-gradient(135deg,#1c1c1c,#2b2b2b,#3d2f2f);
                box-shadow: 0 0 25px rgba(60,40,20,0.7), 0 0 45px rgba(20,20,20,0.8);
                color: #e5e0d8;">

            <!-- Header -->
            <div class="modal-header"
                style="border-bottom: 2px solid rgba(255,255,255,0.1); background: linear-gradient(90deg,#3e3e3e,#5a4633); color: #e5e0d8;">
                <h5 class="modal-title" id="productModalLabel"
                    style="font-size: 26px; font-weight: bold; letter-spacing: 1px;">
                    Product Title
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="filter: invert(1) brightness(2);"></button>
            </div>

            <!-- Body -->
            <div class="modal-body row" style="padding: 30px;">
                <div class="col-md-6" style="text-align:center;">
                    <img id="modalProductImage" src="" class="img-fluid rounded"
                        style="border-radius:15px; max-height: 350px; box-shadow:0 0 30px rgba(60,40,20,0.4);"
                        alt="Product">
                </div>
                <div class="col-md-6" style="padding: 20px; font-family: 'Poppins', sans-serif;">
                    <p style="font-size:18px; color:#d8d2c0;"><strong>Description:</strong> <span
                            id="modalProductDescription"></span></p>
                    <p style="font-size:18px; color:#cbbf9d;"><strong>Available Colors:</strong> <span
                            id="modalProductColors"></span></p>
                    <p style="font-size:20px; font-weight:bold; color:#a67c52;"><strong>Price:</strong> <span
                            id="modalProductPrice"></span></p>
                    <button class="btn btn-dark"
                        style="margin-top:15px; padding:12px 30px; font-size:16px; font-weight:bold; 
                           border-radius:50px; background:linear-gradient(90deg,#5a4633,#929292);
                           border:none; box-shadow:0 0 20px rgba(60,40,20,0.6);">
                        <a href="{{ route('add.to.cart', $product->id) }}" id="addToCartLink"
                            class="btn btn-custom">Add to
                            Cart</a>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {


        $('#productModal').on('show.bs.modal', function() {
            let dialog = $(this).find('.modal-dialog');

            dialog.css({
                'transform': 'scale(0.6) rotate(-5deg)',
                'opacity': '0'
            });

            dialog.animate({
                opacity: 1
            }, {
                step: function(now, fx) {
                    if (fx.prop === "opacity") {
                        dialog.css('transform', 'scale(' + (0.6 + now * 0.4) + ') rotate(' +
                            (-5 + now * 5) + 'deg)');
                    }
                },
                duration: 500,
                easing: 'swing'
            });
        });

        // Glow pulse effect using jQuery
        function pulseGlow() {
            $(".modal-content").animate({
                    boxShadow: "0 0 40px rgba(166,124,82,0.9)"
                }, 1000)
                .animate({
                    boxShadow: "0 0 15px rgba(90,70,50,0.4)"
                }, 1000, pulseGlow);
        }
        pulseGlow();

    });
</script>



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".discover-btn").on("click", function() {
            let id = $(this).data("id");
            let title = $(this).data("title");
            let description = $(this).data("description");
            let image = $(this).data("image");
            let price = $(this).data("price");
            let colors = $(this).data("colors");


            $("#productModalLabel").text(title);
            $("#modalProductImage").attr("src", image);
            $("#modalProductDescription").text(description);
            $("#modalProductPrice").text(price);
            $("#modalProductColors").text(colors);


            $("#addToCartLink").attr("href", "/add-to-cart/" + id);
        });
    });
</script>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
