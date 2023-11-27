<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>List Permissions</h1>
    </div>
    <div class="card">
      <div class="card-header d-flex justify-end p-3">
        @can('create permissions')
          <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">New Permission</a>
        @endcan
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table-bordered table">
            <thead>
              <tr>
                <th class="border-1 border">S.N</th>
                <th class="border-1 border">Name</th>
                <th class="border-1 border">Action</th>
              </tr>
            </thead>
            <tbody>
              @can('access permissions')
                @foreach ($permissions as $permission)
                  <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                      @can('edit permissions')
                        <a href="{{ route('permissions.edit', $permission->id) }}"
                          class="btn btn-primary btn-sm rounded-lg text-white"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('delete permissions')
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <a href="{{ route('permissions.destroy', $permission->id) }}"
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
