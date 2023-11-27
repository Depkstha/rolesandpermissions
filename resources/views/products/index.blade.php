<x-app-layout>
  <section class="section">
    <div class="section-header">
      <h1>List Product</h1>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header d-flex justify-between">
          <h4>Products Information</h4>
          @can('create products')
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Create Products</a>
          @endcan
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table-bordered table">
              <thead>
                <tr>
                  <th class="border-1 border">S.N</th>
                  <th class="border-1 border">Image</th>
                  <th class="border-1 border">Title</th>
                  <th class="border-1 border">Body</th>
                  <th class="border-1 border">Action</th>
                </tr>
              </thead>
              <tbody>
                @can('access products')
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td><img src="{{ asset($product->image) }}" width="60" alt="">
                      </td>
                      <td>{{ $product->title }}</td>
                      <td>{!! $product->description !!}</td>
                      <td>
                        @can('edit products')
                          <a href="{{ route('products.edit', $product->id) }}"
                            class="btn btn-primary btn-sm rounded-lg text-white"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('delete products')
                          <form method="post" action="{{ route('products.destroy', $product->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('products.destroy', $product->id) }}"
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
    </div>
  </section>
</x-app-layout>
