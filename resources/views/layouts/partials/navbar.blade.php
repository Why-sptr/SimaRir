<!-- resources/views/partials/navbar.blade.php -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        @php
        $admin = Auth::guard('admin')->user();
        @endphp

        @if($admin && $admin->avatar)
        @php
        $avatarUrl = Str::startsWith($admin->avatar, 'http') ? $admin->avatar : asset('storage/' . $admin->avatar);
        @endphp
        <img src="{{ $avatarUrl }}" alt="Profile" class="rounded-circle border border-1 border-primary" width="32" height="32">
        @else
        <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 32px; height: 32px;">
          {{ strtoupper(substr($admin->name, 0, 1)) }}
        </div>
        @endif

        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $admin->name }}</span>

      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ $admin->name }}</h6>
          <span>Admin</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="https://wa.me/62895381252534" target="_blank">
            <i class="bi bi-question-circle"></i>
            <span>Butuh Bantuan?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn">Logout</button>
          </form>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->