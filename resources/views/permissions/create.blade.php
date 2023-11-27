<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Manage Permission</h1>
    </div>
    <div class="card">

      @can('create permissions')
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>Create Permission</h4>
          <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      @endcan

      <div class="card-body">
        <form action="{{ route('permissions.store') }}" method="post">

          @csrf

          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="name">Permission Name <span class="text-danger">*</span></label>
                <input id="name" class="form-control rounded-md" value="{{ old('name') }}" type="text"
                  name="name" placeholder="Enter Permission" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 d-flex justify-end">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-app-layout>
