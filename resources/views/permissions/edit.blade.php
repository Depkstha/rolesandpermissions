<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Manage Permissions</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Permissions</h4>
        <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">Back</a>
      </div>

      <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post">

          @csrf
          @method('put')

          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="name">Permission Name <span class="text-danger">*</span></label>
                <input id="name" class="rounded-md form-control" value="{{ old('name', $permission->name) }}"
                  type="text" name="name" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="justify-end col-md-12 d-flex">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-app-layout>
