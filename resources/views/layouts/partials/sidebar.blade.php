<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/list-company', 'admin/verification-company') ? 'active' : '' }} collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Perusahaan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse {{ request()->is('admin/list-company', 'admin/verification-company') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/list-company')}}" class="{{ request()->is('admin/list-company') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Perusahaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/verification-company')}}" class="{{ request()->is('admin/verification-company') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Verifikasi Perusahaan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Perusahaan Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/job-admin', 'admin/job-company') ? 'active' : '' }} collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Loker</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse {{ request()->is('admin/job-admin', 'admin/job-company') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/job-admin')}}" class="{{ request()->is('admin/job-admin') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Loker Admin</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/job-company')}}" class="{{ request()->is('admin/job-company') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Loker Perusahaan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Loker Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/list-user', 'admin/list-admin') ? 'active' : '' }} collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse {{ request()->is('admin/list-user', 'admin/list-admin') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/list-user')}}" class="{{ request()->is('admin/list-user') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List User</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/list-admin')}}" class="{{ request()->is('admin/list-admin') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Admin</span>
          </a>
        </li>
      </ul>
    </li><!-- End User Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/skill', 'admin/company-field') ? 'active' : '' }} collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse {{ request()->is('admin/skill', 'admin/company-field') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/skill')}}" class="{{ request()->is('admin/skill') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Skill</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/company-field')}}" class="{{ request()->is('admin/company-field') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Bidang Perusahaan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Setting Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('users-profile') ? 'active' : '' }}" href="#">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

  </ul>
</aside><!-- End Sidebar-->