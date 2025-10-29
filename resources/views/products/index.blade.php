<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Panel - Product List</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #212529;
            color: #fff;
            position: fixed;
            width: 220px;
            padding-top: 1.5rem;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 220px;
            padding: 2rem;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }

        .card {
            border: none;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table th {
            background-color: #343a40;
            color: #fff;
        }

        table tbody tr:hover {
            background-color: #f1f3f5;
        }

        .color-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin: 0 3px;
            border: 1px solid #ccc;
        }

        .badge-size {
            font-size: 0.8rem;
            margin: 1px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <a href="{{ url('/dashboard') }}" class="active"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a href="{{ url('/products') }}"><i class="bi bi-box-seam me-2"></i>Products</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark rounded mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Product Management</a>
                <div>
                    <a href="{{ url('products/create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </a>
                </div>
            </div>
        </nav>

        <div class="card">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                <h4 class="fw-bold m-0">Products List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Colors</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Image"
                                            width="60" class="rounded">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td style="max-width: 200px;">{{ Str::limit($product->description, 60) }}</td>
                                    <td>${{ $product->price }}</td>

                                    <!-- Colors -->
                                    <!-- Colors -->




                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
</body>

</html>
