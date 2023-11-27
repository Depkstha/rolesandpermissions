<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Create Product</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-between">
        <h5>Add New Product</h5>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Back</a>
      </div>

      <div class="card-body">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input id="title" class="form-control rounded-md" type="text" name="title" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description <span class="text-danger">*</span></label>
                <textarea id="description" class="form-control rounded-sm" type="text" name="description"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="image">Image <span class="text-danger">*</span></label>
                <input id="image" type="file" class="form-control" name="image" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 d-flex justify-end">
              <button type="submit" class="btn btn-primary">Save Record</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-app-layout>
