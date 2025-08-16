<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">

      {{-- Top bar with Create button --}}
      <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-dark">+ Create Product</a>
      </div>

      {{-- Success message --}}
      @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif

      {{-- Products Table --}}
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
          <h5 class="mb-0">Products</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Status</th>
                <th width="180">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>
                  @if($product->image)
                    <img src="{{ asset('upload/products/'.$product->image) }}" 
     style="width:60px; height:60px; object-fit:cover; border-radius:5px; display:block;" 
     alt="{{ $product->name }}">

                  @else
                    <img src="https://placehold.co/60x60" width="60" height="60">
                  @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                  <span class="badge bg-{{ $product->status == 'Active' ? 'success' : 'danger' }}">
                    {{ $product->status }}
                  </span>
                </td>
                <td>
                  {{-- Edit button --}}
                  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark btn-sm">Edit</a>

                  {{-- Delete form --}}
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this product?')">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">No products found.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
