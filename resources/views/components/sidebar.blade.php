<div>
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">Shopsphere</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">Sp</a>
    </div>
    <ul class="sidebar-menu">
      <li><a class="nav-link" href="{{ route('roles.index') }}"><i class="far fa-square"></i> <span>Roles</span></a></li>
      <li><a class="nav-link" href="{{route('permissions.index')}}"><i class="far fa-square"></i> <span>Permissions</span></a></li>
      <li><a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-square"></i> <span>Users</span></a>
      </li>
      <li><a class="nav-link" href="{{route('products.index')}}"><i class="far fa-square"></i> <span>Products</span></a></li>


      {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
              <span>Layout</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
              <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
          </li> --}}


    </ul>
  </aside>

</div>
