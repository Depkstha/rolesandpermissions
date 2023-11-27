<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>Manage Users</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('users.create') }}"></a>
          </div>
          @can('access users')
            <div class="card-body">
              {{ $dataTable->table() }}
            </div>
          @endcan
        </div>
      </div>
    </div>
  </section>
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</x-app-layout>
