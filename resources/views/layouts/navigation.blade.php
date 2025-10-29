<head>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg bg-light border-bottom mt-3">
    <div class="container">


        <a class="navbar-brand fw-semibold fs-2" href="{{ route('dashboard') }}"
            style="font-family: 'Lato'; color: rgb(55, 55, 55);">
            ZIPPER
        </a>
        <li class="nav-item ms-lg-3 position-relative">
            <form id="searchForm" class="d-flex align-items-center">
                <input type="text" id="searchBox" name="query" class="form-control rounded-pill"
                    placeholder="Search products..." autocomplete="off"
                    style="width: 220px; font-size: 14px; padding-left: 15px;">
            </form>

            <ul id="searchResults" class="dropdown-menu show shadow border-0 rounded-3 mt-2 w-100"
                style="display: none; max-height: 300px; overflow-y: auto;">
            </ul>
        </li>



        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto fw-bold fs-5 align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard" style="color: rgb(80,74,74);">Home</a>
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
                        <i class="fas fa-shopping-cart"></i> ({{ session('cart') ? count(session('cart')) : 0 }})
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('#searchBox').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('ajax.search') }}", // route to be made next
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#searchResults').html(data);
                        $('#searchResults').show();
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#searchForm').length) {
                $('#searchResults').hide();
            }
        });

    });
</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
