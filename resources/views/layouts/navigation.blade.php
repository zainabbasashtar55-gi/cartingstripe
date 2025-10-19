<head>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg bg-white border-bottom mt-3">
    <div class="container">


        <a class="navbar-brand fw-semibold fs-2" href="{{ route('dashboard') }}"
            style="font-family: 'Lato'; color: rgb(80,74,74);">
            ZIPPER
        </a>


        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto fw-bold fs-5 align-items-lg-center" style="margin-top: -0px">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/dashboard">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="/about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="/men">Men's Fashion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="/women">Women's Fashion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="/contact">Contact</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-dark" href="#" data-bs-toggle="offcanvas"
                        data-bs-target="#cartSidebar" aria-controls="cartSidebar">
                        Cart ({{ session('cart') ? count(session('cart')) : 0 }})
                    </a>
                </li>


            </ul>
        </div>
    </div>
</nav>


<div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="cartSidebarLabel">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if (session('cart') && count(session('cart')) > 0)
            <ul class="list-group">
                @foreach (session('cart') as $key => $value)
                    <li class="list-group-item d-flex align-items-center">
                        <img src="{{ asset('storage/' . $value['image']) }}" alt="{{ $value['name'] }}"
                            class="me-2 rounded" style="width:50px; height:50px; object-fit:cover;">
                        <div>
                            <strong>{{ $value['name'] }}</strong><br>
                            ${{ $value['price'] }} ({{ $value['quantity'] }})
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-3 text-center">
                <a href="/cart" class="btn btn-dark w-100">View Cart</a>
            </div>
        @else
            <p class="text-muted">No items in cart</p>
        @endif
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
