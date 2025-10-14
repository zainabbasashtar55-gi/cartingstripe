<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
       
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

       
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
      <div class="container-fluid mt-5" >
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 style="text-align: center;font-weight: bold;">Products list</h1>
                        <a href="{{ url('products/create') }}" class="btn btn-primary">Add Product</a>
                    </div>
                </div>
                <div class="card-body">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-primary"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">name</th>
                                    <th scope="col">category</th>
                                    <th scope="col">description</th>
                                    <th scope="col">price</th>
                                
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($products as $product)
                                <tr class="">
                                    <td scope="row">{{ $product->id }}</td>
                                    <td>{{$product->image}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                   
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>

                                    <td>
                                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-dark">Edit</a>

<form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
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
      </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
