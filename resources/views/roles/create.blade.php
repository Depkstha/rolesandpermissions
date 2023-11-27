<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Add New Role</h1>
    </div>
    <div class="container">
      <div class="card">
        @can('create roles')
          <div class="card-header d-flex justify-between">
            <h4>Create Role</h4>
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Back</a>
          </div>
        @endcan

        <div class="card-body">
          <form action="{{ route('roles.store') }}" method="post">

            @csrf

            <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label for="name">Role Name<span class="text-danger">*</span></label>
                  <input id="name" class="form-control rounded-md" value="{{ old('name') }}" type="text"
                    name="name" placeholder="Enter Role" />
                </div>
              </div>

              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="name">Permissions</label>
                    <div class="d-flex flex-wrap">
                      @foreach ($permissions as $permission)
                        <div class="px-3">
                          <input class="form-check-input" type="checkbox" id="{{ $permission->name }}"
                            name="permissions[]" value="{{ $permission->name }}"><span
                            class="mr-3">{{ $permission->name }}</span>
                        </div>
                      @endforeach
                    </div>
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
    </div>
  </section>
</x-app-layout>
