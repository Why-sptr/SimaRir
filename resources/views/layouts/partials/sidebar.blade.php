<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    
    <li class="nav-heading">Halaman</li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/company', 'admin/verification') ? 'active' : '' }} collapsed" data-bs-target="#perusahaan-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-building"></i><span>Perusahaan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="perusahaan-nav" class="nav-content collapse {{ request()->is('admin/company', 'admin/verification') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/company')}}" class="{{ request()->is('admin/company') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Perusahaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/verification')}}" class="{{ request()->is('admin/verification') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Verifikasi Perusahaan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Perusahaan Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/job-admin', 'admin/job-work') ? 'active' : '' }} collapsed" data-bs-target="#loker-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Loker</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="loker-nav" class="nav-content collapse {{ request()->is('admin/job-admin', 'admin/job-work') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/job-work')}}" class="{{ request()->is('admin/job-work') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Loker Perusahaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/job-admin')}}" class="{{ request()->is('admin/job-admin') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Loker Admin</span>
          </a>
        </li>
      </ul>
    </li><!-- End Loker Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/user', 'admin/admin') ? 'active' : '' }} collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse {{ request()->is('admin/user', 'admin/admin') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/user')}}" class="{{ request()->is('admin/user') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List User</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/admin')}}" class="{{ request()->is('admin/admin') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Admin</span>
          </a>
        </li>
      </ul>
    </li><!-- End User Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/education', 'admin/job-role', 'admin/skill', 'admin/work-method', 'admin/work-type', 'admin/corporate-field') ? 'active' : '' }} collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Setting Website</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content collapse {{ request()->is('admin/education', 'admin/job-role', 'admin/skill', 'admin/work-method', 'admin/work-type', 'admin/corporate-field') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/admin/education')}}" class="{{ request()->is('admin/education') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Pendidikan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/job-role')}}" class="{{ request()->is('admin/job-role') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Role Pekerjaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/skill')}}" class="{{ request()->is('admin/skill') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Skill</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/work-method')}}" class="{{ request()->is('admin/work-method') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Metode Pekerjaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/work-type')}}" class="{{ request()->is('admin/work-type') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Tipe Pekerjaan</span>
          </a>
        </li>
        <li>
          <a href="{{url('/admin/corporate-field')}}" class="{{ request()->is('admin/corporate-field') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Bidang Perusahaan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Setting Website Nav -->

  </ul>
</aside><!-- End Sidebar-->