<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Manage Roles</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Role</h4>
        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Back</a>
      </div>

      <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="post">

          @csrf
          @method('put')

          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="name">Role Name <span class="text-danger">*</span></label>
                <input id="name" class="form-control rounded-md" value="{{ old('name', $role->name) }}"
                  type="text" name="name" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label for="name">Permissions</label>
                  <div class="d-flex flex-wrap px-5">
                    @foreach ($permissions as $permission)
                      <div>
                        <input class="form-check-input" type="checkbox" name="permissions[]"
                          value="{{ $permission->name }}" @if (count($role->permissions->where('id', $permission->id))) checked @endif><span
                          class="mr-5">{{ $permission->name }}</span>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 d-flex justify-end">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </section>
</x-app-layout>
