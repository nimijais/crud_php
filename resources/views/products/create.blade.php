<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="bg-dark text-center text-white py-3">
      <h1 class="h3">CRUD Operation</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="d-flex justify-content-end p-0 mt-3">
          <a href="" class="btn btn-dark">Create</a>
        </div>
        <div class="card p-0 mt-3">
          <div class="class-header bg-dark text-white">
            <h4 class="h4">Create Product</h4>
          </div>
          <div class="card-body shadow-lg">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        @error('name')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="sku" class="form-label">SKU</label>
        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="SKU" value="{{ old('sku') }}">
        @error('sku')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
        @error('price')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-dark">Submit</button>
</form>

          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>