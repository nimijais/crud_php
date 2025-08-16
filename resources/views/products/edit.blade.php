<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Edit Product</h4>
        </div>
        <div class="card-body">

          {{-- Update form --}}
          <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Product Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            {{-- SKU --}}
            <div class="mb-3">
              <label for="sku" class="form-label">SKU</label>
              <input type="text" name="sku" id="sku" value="{{ $product->sku }}" class="form-control" required>
            </div>

            {{-- Price --}}
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            {{-- Status --}}
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
                <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>

            {{-- Product Image --}}
            <div class="mb-3">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" name="image" id="image" class="form-control">

              @if($product->image)
                <div class="mt-2">
                  <img src="{{ asset('upload/products/'.$product->image) }}" width="100" height="100" style="object-fit:cover;">
                </div>
              @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-dark">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
          </form>

        </div>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
