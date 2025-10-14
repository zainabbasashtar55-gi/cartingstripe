<!doctype html>
<html lang="en">
    <head>
        <title>Edit Signal</title>
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
      <div class="container mt-5">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 style="text-align: center;font-weight: bold;">Edit Product</h1>
                        <a href="{{ url ('products') }}" class="btn btn-secondary" style="font-size: 22px;">Back</a>
                    </div> 
                </div>
                <div class="card-body">
                    {{-- Corrected form action, enctype, and submission button --}}
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label"> name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            {{-- Optional: Display current image to the user --}}
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" width="100" class="mt-2 rounded">
                            @endif
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="mb-3">
                            <label for="category" class="form-label">category</label>
                            <textarea class="form-control" id="category" name="category" rows="3" required>{{ old('category', $product->category) }}</textarea>
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="mb-3">
                            <label for="price" class="form-label">price</label>
                            <textarea class="form-control" id="price" name="price" rows="3" required>{{ old('price', $product->price) }}</textarea>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                       
                        {{-- The button must be inside the form and be of type submit --}}
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </form>
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