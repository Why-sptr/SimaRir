<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Perusahaan</title>
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
                            <a class="nav-link fw-semibold" href="/apply">Lamaran</a>
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
        <div class="container mt-4">
            <div class="card p-3 border-1 border-primary">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px;">
                            <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Profile Avatar" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover;  border: 1px solid #ddd;" class="img-fluid rounded-2">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <h3 class="fw-bold">{{ $company->user->name }}</h3>
                        <p>{{ $company->user->moto }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-map-pin text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->user->location }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-buildings text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->corporateField->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-users-three text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->employee }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-seal-check" style="width: 24px; color: blue;"></i>
                                    @if ($company->status_verification == 0)
                                    <span class="badge bg-secondary p-2">Belum Terverifikasi</span>
                                    @elseif ($company->status_verification == 1)
                                    <span class="badge bg-success p-2" style="background-color: blue !important;">Terverifikasi</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card p-3 border-1 border-primary">
                <h5 class="fw-bold">Lowongan Pekerjaan</h5>
                <div class="row g-4" id="job-list">
                    @foreach ($jobWorks as $jobWork)
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="card border-1 w-100 h-100">
                            <a class="card-body d-flex flex-column" href="{{ route('user-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">
                                <div class="d-flex justify-content-between gap-2 px-3 mt-3">
                                    <h5 class="card-title text-truncate fw-semibold" style="width: 85%;">
                                        {{ $jobWork->name }}
                                    </h5>
                                    <p class="text-primary fw-semibold text-end">
                                        @php
                                        $salary = $jobWork->salary;
                                        if ($salary >= 1000000000) {
                                        $salary = number_format($salary / 1000000000, 1) . ' m';
                                        } elseif ($salary >= 1000000) {
                                        $salary = number_format($salary / 1000000, 1) . ' jt';
                                        } else {
                                        $salary = number_format($salary / 1000, 1) . ' rb';
                                        }
                                        @endphp
                                        {{ $salary }}
                                    </p>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 px-3 mb-3">
                                    <div class="d-flex flex-wrap mb-3 gap-1">
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->workMethod->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->workType->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->work_experience }} Tahun</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->education->name }}</span>
                                        @if ($jobWork->qualification->major)
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->major }}</span>
                                        @endif
                                        @if ($jobWork->qualification->ipk)
                                        <span class="badge badge-outline-primary p-2">IPK {{ $jobWork->qualification->ipk }}</span>
                                        @endif
                                        <span class="badge badge-outline-primary p-2">+ {{ $jobWork->skillJobs->count() + 1 }}</span>
                                    </div>
                                    <div class="mt-auto">
                                        <div>
                                            <p class="mb-0 text-primary fw-semibold">{{ $jobWork->company->user->name }}</p>
                                            <p class="mb-0 text-muted">{{ $jobWork->location }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($jobWork->start_date)->locale('id_ID')->diffForHumans() }}</small>
                                            <button class="btn btn-sm">
                                                <i class="fa-regular fa-bookmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @endforeach

                    <div class="d-flex justify-content-center mt-4" id="pagination">
                        {{ $jobWorks->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card border-1 border-primary p-3">
                <h5 class="fw-bold">Deskripsi Perusahaan</h5>
                <div class="text">
                    {!! $company->user->description !!}
                </div>
            </div>
        </div>

        <div class="container my-4">
            <div class="card border-1 border-primary p-3">
                <h5 class="fw-bold">Informasi Perusahaan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-1 h-100 p-3">
                            <h6 class="mb-3">Hari dan Jam Kerja</h6>
                            <ul class="list-unstyled">
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Senin</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->monday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Selasa</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->tuesday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Rabu</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->wednesday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Kamis</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->thursday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Jumat</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->friday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Sabtu</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->saturday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-4 col-md-4">
                                        <span>Minggu</span>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <span class="ms-auto">: {{ $company->workTimes->sunday ?? 'Tidak ada data' }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-1 h-100 p-3">
                            <h6 class="mb-3">Informasi Lainnya</h6>
                            <ul class="list-unstyled">
                                {{-- Menampilkan Email Pengguna --}}
                                <li>
                                    <p>
                                        <span class="badge bg-primary rounded-pill p-2">
                                            <i class="ph-duotone ph-envelope"></i>
                                        </span> {{ $company->user->email }}
                                    </p>
                                </li>
                                {{-- Periksa Media Sosial --}}
                                @if ($company->user && $company->user->socialMedia)
                                @php
                                $socialLinks = [
                                'instagram' => $company->user->socialMedia->instagram,
                                'github' => $company->user->socialMedia->github,
                                'youtube' => $company->user->socialMedia->youtube,
                                'website' => $company->user->socialMedia->website,
                                'linkedin' => $company->user->socialMedia->linkedin,
                                'tiktok' => $company->user->socialMedia->tiktok,
                                ];
                                @endphp

                                {{-- Looping untuk Media Sosial --}}
                                @foreach ($socialLinks as $platform => $link)
                                @if ($link)
                                <li>
                                    <p>
                                        <span class="badge bg-primary rounded-pill p-2">
                                            @if ($platform === 'website')
                                            <i class="ph-duotone ph-globe"></i> {{-- Ikon untuk Website --}}
                                            @else
                                            <i class="ph-duotone ph-{{ $platform }}-logo"></i> {{-- Ikon untuk Platform Lain --}}
                                            @endif
                                        </span>
                                        <a href="{{ $link }}" target="_blank">
                                            {{ ucfirst($platform) }}
                                        </a>
                                    </p>
                                </li>
                                @endif
                                @endforeach
                                @else
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="">
                                </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card h-100 border-1 border-primary p-3">
                <h5 class="fw-bold mb-3">Galeri Perusahaan</h5>
                <div class="row g-4">
                    @foreach ($company->galleries as $gallery)
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                        $column='image' . $i;
                        $imagePath=$gallery->$column ? asset('storage/gallery_images/' . $gallery->$column) : null;
                        @endphp

                        @if ($imagePath)
                        <div class="col-4">
                            <img src="{{ $imagePath }}"
                                alt="Company Galeri {{ $i }}"
                                style="max-height: 500px; max-width: 500px; width: 100%; height: 100%; object-fit: cover; border: 1px solid #ddd;"
                                class="rounded w-100">
                        </div>
                        @endif
                        @endfor
                        @endforeach
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        fetchJobWorks(url);
    });

    function fetchJobWorks(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#job-list').html($(response).find('#job-list').html());
                $('#pagination').html($(response).find('#pagination').html());
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    }
</script>

</html>