<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>List Roles</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-end">
        @can('create roles')
          <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">New Role</a>
        @endcan
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table-bordered table">
            <thead>
              <tr>
                <th class="border-1 border">S.N</th>
                <th class="border-1 border">Name</th>
                <th class="border-1 border">Permissions</th>
                <th class="border-1 border">Action</th>
              </tr>
            </thead>
            <tbody>
              @can('access roles')
                @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    @foreach ($role->permissions as $permission)
                      <td class="badge">{{ $permission->name }}</td>
                    @endforeach
                    <td>
                      @can('edit roles')
                        <a href="{{ route('roles.edit', $role->id) }}"
                          class="btn btn-primary btn-sm rounded-lg text-white"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('delete roles')
                        <form method="post" action="{{ route('roles.destroy', $role->id) }}">
                          @csrf
                          @method('delete')
                          <a href="{{ route('roles.destroy', $role->id) }}"
                            class="btn btn-danger btn-sm rounded-lg text-white"
                            onclick="event.preventDefault();this.closest('form').submit();"><i
                              class="fas fa-trash-alt"></i></a>
                        </form>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              @endcan
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
