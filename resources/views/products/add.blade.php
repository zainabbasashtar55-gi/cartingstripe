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
      <div class="container mt-5" >
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 style="text-align: center;font-weight: bold;">Post Products</h1>
                        <a href="{{ url('products.index') }}" class="btn btn-secondary" style="font-size: 22px;">Back</a>
                    </div> 
                </div>
                <div class="card-body">
                  <form action=" /products" method="POST" enctype="multipart/form-data">

                       @csrf
                      <div class="mb-3">
   <label for="name" class="form-label"> Name</label>
   <input type="text" class="form-control" id="name" name="name" required>
   @error('name')
       <div class="alert alert-danger">{{ $message }}</div>
   @enderror
</div>

                         <div class="mb-3">
                           <label for="image" class="form-label">Image</label>
                           <input type="file" class="form-control" id="image" name="image" required>
                           @error('image')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

 <div class="mb-3">
                           <label for="category" class="form-label">category</label>
                           <input type="text" class="form-control" id="category" name="category" required>
                           @error('category')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>


                       <div class="mb-3">
                           <label for="description" class="form-label">description</label>
                           <input type="text" class="form-control" id="description" name="description" required>
                           @error('description')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                         <div class="mb-3">
                           <label for="price" class="form-label">price</label>
                           <input type="text" class="form-control" id="price" name="price" required>
                           @error('price')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <button style="font-size: 22px;font-weight: bold;" type="submit" class="btn btn-primary form-control">Post Signal</button>
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
