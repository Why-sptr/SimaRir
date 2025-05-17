<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lamaran Saya</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container p-3">
            <a class="navbar-brand" href="#" class="action"><img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50px;"></i></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav gap-3 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-job-work">Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-company">Perusahaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary fw-bold" href="/apply">Lamaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/favorite">Disimpan</a>
                        </li>
                        <li class="nav-item dropdown pe-3">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                @if ($user->avatar)
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Profile Avatar" style="width: 35px; height: 35px; object-fit: cover" class="rounded-circle border border-1 border-primary">
                                @else
                                <img src="{{ asset('assets/img/default-user.png') }}" alt="Profile Avatar" style="width: 35px; height: 35px; object-fit: cover" class="rounded-circle border border-1 border-primary">
                                @endif
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->name }}</span>
                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile p-2">
                                <li class="dropdown-header">
                                    <h6>{{ $user->name }}</h6>
                                    <span>{{ $user->jobRole->name }}</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/user-profile">
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
                                    <a class="dropdown-item d-flex align-items-center" href="/logout">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Keluar</span>
                                    </a>
                                </li>

                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container my-2">
            <div class="alert bg-white border border-1 border-primary alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                Hallo <span class="text-primary fw-bold">{{auth()->user()->name}} 👋</span>. Sekarang kamu udah bisa lihat pekerjaan yang sudah kamu lamar disini.
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-1 border-primary p-3">
                        <button class="btn btn-dark w-100 d-md-none mb-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarContent" aria-expanded="false" aria-controls="sidebarContent">
                            Filter
                        </button>
                        <div class="collapse d-md-block sticky-sidebar" id="sidebarContent">
                            <!-- Jenis Section -->
                            <div class="mb-4">
                                <form action="{{ route('apply.index') }}" method="GET" id="filterForm">
                                    <!-- Search hidden field to sync with main search -->
                                    @if(request()->has('search'))
                                    <input type="hidden" name="search" id="sidebar-search-input" value="{{ request('search') }}">
                                    @endif

                                    <!-- Status Section -->
                                    <div class="mb-4">
                                        <h6 class="fw-bold">Status Lamaran</h6>
                                        <div class="form-check">
                                            <input class="form-check-input custom-checkbox" type="checkbox"
                                                name="statuses[]" value="{{ \App\Models\Candidate::STATUS_PENDING }}"
                                                id="statusPending"
                                                {{ in_array(\App\Models\Candidate::STATUS_PENDING, request('statuses', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusPending">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input custom-checkbox" type="checkbox"
                                                name="statuses[]" value="{{ \App\Models\Candidate::STATUS_REVIEW }}"
                                                id="statusReview"
                                                {{ in_array(\App\Models\Candidate::STATUS_REVIEW, request('statuses', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusReview">
                                                Review
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input custom-checkbox" type="checkbox"
                                                name="statuses[]" value="{{ \App\Models\Candidate::STATUS_ACCEPTED }}"
                                                id="statusAccepted"
                                                {{ in_array(\App\Models\Candidate::STATUS_ACCEPTED, request('statuses', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusAccepted">
                                                Accepted
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input custom-checkbox" type="checkbox"
                                                name="statuses[]" value="{{ \App\Models\Candidate::STATUS_REJECTED }}"
                                                id="statusRejected"
                                                {{ in_array(\App\Models\Candidate::STATUS_REJECTED, request('statuses', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusRejected">
                                                Rejected
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row g-3">
                        <div class="container my-3">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <form action="{{ route('apply.index') }}" method="GET" id="searchForm">
                                        <div class="search-container justify-content-center d-flex mt-4 mt-md-0">
                                            <input type="text" class="form-control search-input" name="search"
                                                placeholder="Search..." value="{{ request('search') }}" id="main-search-input">
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="ph-duotone ph-magnifying-glass search-icon me-3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if ($candidates->count() > 0)
                        @foreach ($candidates as $candidate)
                        @php
                       $isExpired = $candidate->jobWork->end_date && \Carbon\Carbon::parse($candidate->jobWork->end_date)->lt(\Carbon\Carbon::now());
                        @endphp
                        <div class="col-12 d-flex">
                            <div class="card border-1 border-primary flex-grow-1 {{ $isExpired ? 'bg-secondary bg-opacity-25' : 'bg-white' }}">
                                <a href="{{ route('user-job-work.show', $candidate->jobWork->id) }}" class="card-body" style="text-decoration: none; color: inherit;">
                                    <!-- Job Title and Salary -->
                                    <div class="d-flex justify-content-between px-3 mt-3">
                                        <h5 class="card-title text-truncate fw-semibold mb-2 text-dark col-md-10">{{ $candidate->jobWork->name }}</h5>
                                        <p class="text-primary fw-semibold mb-1 text-end col-md-2">Rp {{ number_format($candidate->jobWork->salary, 0, ',', '.') }}</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-3 gap-1 px-3">
                                        <span class="badge badge-outline-primary p-2">{{ $candidate->jobWork->workMethod->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $candidate->jobWork->workType->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $candidate->jobWork->qualification->work_experience }} Tahun</span>
                                        <span class="badge badge-outline-primary p-2">{{ $candidate->jobWork->qualification->education->name }}</span>
                                        @if ($candidate->jobWork->qualification->major)
                                        <span class="badge badge-outline-primary p-2">{{ $candidate->jobWork->qualification->major }}</span>
                                        @endif
                                        @if ($candidate->jobWork->qualification->ipk)
                                        <span class="badge badge-outline-primary p-2">IPK {{ $candidate->jobWork->qualification->ipk }}</span>
                                        @endif
                                        <span class="badge badge-outline-primary p-2">+ {{ $candidate->jobWork->skillJobs->count() + 1 }}</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2 px-3">
                                        @if ($candidate->jobWork->company->user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $candidate->jobWork->company->user->avatar) }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        <img src="{{ asset('assets/img/default-user.png') }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 45px; height: 45px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <div class="d-flex align-items-center justify-content-center gap-1">
                                                <p class="mb-0 text-primary fw-semibold text-truncate">{{ $candidate->jobWork->company->user->name }}</p>
                                                @if ($candidate->jobWork->company->status_verification == 1)
                                                <i class="ph-duotone ph-seal-check" style="width: 24px; color: blue;"></i>
                                                @endif
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="ph-duotone ph-map-pin"></i>
                                                <small class="card-text text-muted">{{ $candidate->jobWork->location }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-3 mx-3 border-primary">
                                    <!-- Footer -->
                                    @php
                                    $badgeClass = match ($candidate->status) {
                                    \App\Models\Candidate::STATUS_REVIEW => 'badge-outline-primary',
                                    \App\Models\Candidate::STATUS_REJECTED => 'badge-outline-danger',
                                    \App\Models\Candidate::STATUS_PENDING => 'badge-outline-warning',
                                    \App\Models\Candidate::STATUS_ACCEPTED => 'badge-outline-success',
                                    default => 'badge-outline-secondary'
                                    };
                                    @endphp

                                    <span class="badge {{ $badgeClass }} px-3 py-2 mx-3 mb-3">
                                        {{ ucfirst($candidate->status) }}
                                    </span>

                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">
                            <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-50" alt="">
                        </div>
                        @endif

                        <!-- Pagination -->
                        <nav class="mt-4 pagination-web">
                            <ul class="pagination justify-content-center">
                                @for ($i = 1; $i <= $candidates->lastPage(); $i++)
                                    <li class="page-item {{ $candidates->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link p-2 {{ $candidates->currentPage() == $i ? 'active' : '' }}" href="{{ $candidates->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50px;">
      </a>
      <span class="text-muted">&copy; 2025 Mahasiswa Berkarir, Simarir</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook-f"></i></svg></a></li>
    </ul>
  </footer>
</div>
</html>