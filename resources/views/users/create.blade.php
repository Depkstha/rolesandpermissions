<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Create User</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h5>Add New User</h5>
        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Back</a>
      </div>

      <div class="card-body">
        <div class="card-body">
          <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Name <span class="text-danger">*</span></label>
                  <input id="name" class="form-control rounded-md" type="text" name="name" required />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">Email <span class="text-danger">*</span></label>
                  <input id="email" class="form-control rounded-md" type="text" name="email" required />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password">Password <span class="text-danger">*</span></label>
                  <input id="password" class="form-control rounded-md" type="password" name="password" required />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="role_id">Role<span class="text-danger">*</span></label>
                  <select class="form-control rounded-md" name="role">
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>
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
    </div>
  </section>
</x-app-layout>
