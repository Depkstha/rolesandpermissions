<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Edit Products</h1>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>Edit products</h4>
          <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>

        <div class="card-body">
          <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title <span class="text-danger">*</span></label>
                  <input id="title" class="form-control rounded-md" type="text" name="title"
                    value="{{ $products->title }}" required />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Description </label>
                  <textarea id="description" class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="image">Image <span class="text-danger">*</span></label>
                  <input id="image" type="file" class="form-control" name="image" />
                  <img class="ml-3" src="{{ asset($product->image) }}" width="150">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 d-flex justify-end">
                <button type="submit" class="btn btn-primary">Update Record</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>

</x-app-layout>
