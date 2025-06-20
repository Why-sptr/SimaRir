<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Perusahaan</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css" />
</head>
<style>
        #location-suggestions {
        width: 93%;
        max-width: 93%;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

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
                            <a class="nav-link active fw-bold" href="/company">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work/create">Upload Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work">List Pekerjaan</a>
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
                                    @foreach ($companies as $company)
                                    <span>{{ $company->corporateField->name }}</span>
                                    @endforeach
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/company">
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
        @foreach ($companies as $company)
        <div class="container mt-4">
            <div class="card p-3 border-1 border-primary">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($company->user->avatar)
                            <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Profile Avatar" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover; border: 1px solid #ddd;" class="img-fluid rounded-2">
                            @else
                            <img src="{{ asset('assets/img/default-user.png') }}" alt="Company Logo" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover; border: 1px solid #ddd;" class="img-fluid rounded-2">
                            @endif
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <a href="#" class="action mb-2" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="ph-duotone ph-pen"></i>
                        </a>
                        <h3 class="fw-bold">{{$company->user->name}}</h3>
                        <p>{{$company->user->moto}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-map-pin text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{$company->user->location}}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-buildings text-primary" style="width: 24px;"></i>
                                    <p class="card-text">
                                        {{ $company->corporateField->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-users-three text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{$company->employee}} Karyawan</p>
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
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="fw-bold">Lowongan Pekerjaan</h5>
                    <a href="{{ route('company-job-work.create') }}" class="action-add">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <div class="row g-4" id="job-list">
                    @if ($jobWorks->count() > 0)
                    @foreach ($jobWorks as $jobWork)
                    @php
                    $isExpired = \Carbon\Carbon::parse($jobWork->end_date)->lt(\Carbon\Carbon::now());
                    @endphp
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="card border-1 w-100 h-100 {{ $isExpired ? 'bg-secondary bg-opacity-25' : 'bg-white' }}">
                            <a class="card-body d-flex flex-column text-decoration-none" href="{{ route('company-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">
                                <div class="d-flex justify-content-between gap-2 px-3 mt-3">
                                    <h5 class="card-title text-truncate fw-semibold text-dark" style="width: 85%;">
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
                                            <small class="mb-0 text-muted">{{ $jobWork->location }}</small>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-between align-items-center">
                                            <small class="text-muted">{{ count($jobWork->candidates) }} Pelamar</small>
                                            <div class="d-flex align-items-center gap-2">
                                                <small class="text-dark">Berakhir pada : {{ $jobWork->end_date}}</small>
                                                <a href="{{ route('company-job-work.edit', $jobWork->id) }}" class="action">
                                                    <i class="ph-duotone ph-pen"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @endforeach
                    @else
                    <div class="text-center">
                        <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-25" alt="">
                    </div>
                    @endif

                    <!-- Pagination -->
                    <nav class="mt-4 pagination-web">
                        <ul class="pagination justify-content-center">
                            @for ($i = 1; $i <= $jobWorks->lastPage(); $i++)
                                <li class="page-item {{ $jobWorks->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link p-2 {{ $jobWorks->currentPage() == $i ? 'active' : '' }}" href="{{ $jobWorks->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card border-1 border-primary p-3">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold">Deskripsi Perusahaan</h5>
                    <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#descriptionModal">
                        <i class="ph-duotone ph-pen"></i>
                    </a>
                </div>
                @if (strlen($company->user->description) > 0)
                <p>
                    {{$company->user->description}}
                </p>
                @else
                <div class="text-center">
                    <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-25" alt="">
                </div>
                @endif
            </div>
        </div>

        <div class="container my-4">
            <div class="card border-1 border-primary p-4">
                <h5 class="fw-bold">Informasi Perusahaan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-1 h-100 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3">Hari dan Jam Kerja</h6>
                                <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#workTimeModal">
                                    <i class="ph-duotone ph-pen"></i>
                                </a>
                            </div>
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
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3">Informasi Lainnya</h6>
                                <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#addEditModal">
                                    <i class="ph-duotone ph-pen"></i>
                                </a>
                            </div>
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
                                <p>Media sosial belum ditambahkan.</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <div class="container mt-4">
            <div class="card h-100 border-1 border-primary p-3">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold mb-3">Galeri Perusahaan</h5>
                    <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <i class="ph-duotone ph-pen"></i>
                    </a>
                </div>

                @if ($company->galleries->count() > 0)
                <div class="row g-4">
                    @foreach ($company->galleries as $gallery)
                        @for ($i = 1; $i <= 6; $i++)
                            @php
                                $column = 'image' . $i;
                                $imagePath = $gallery->$column ? asset('storage/gallery_images/' . $gallery->$column) : null;
                            @endphp

                            @if ($imagePath)
                            <div class="col-4">
                                <a 
                                    href="{{ $imagePath }}" 
                                    data-fancybox="gallery" 
                                    data-caption="Galeri Perusahaan {{ $i }}">
                                    <img src="{{ $imagePath }}"
                                        alt="Company Galeri {{ $i }}"
                                        style="max-height: 500px; max-width: 500px; width: 100%; height: 100%; object-fit: cover; border: 1px solid #ddd;"
                                        class="rounded w-100">
                                </a>
                            </div>
                            @endif
                        @endfor
                    @endforeach
                </div>
                @else
                <div class="text-center">
                    <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-25" alt="">
                </div>
                @endif
            </div>
        </div>

        @endforeach
        <!-- Modal User Company -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to edit the user's details -->
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <!-- Location Field -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ auth()->user()->location }}">
                                <div id="location-suggestions" class="list-group position-absolute w-100" style="max-height: 200px; overflow-y: auto; display: none;"></div>
                            </div>

                            <!-- Corporate Field -->
                            <div class="mb-3">
                                <label for="corporateField" class="form-label">Corporate Field</label>
                                <select class="form-control" id="corporateField" name="corporateField">
                                    <option value="" disabled selected>Select Corporate Field</option>
                                    @foreach ($corporateFields as $field)
                                    <option value="{{ $field->id }}"
                                        {{ $field->id == $company->corporate_field_id ? 'selected' : '' }}>
                                        {{ $field->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Employee Field -->
                            <div class="mb-3">
                                <label for="employee" class="form-label">Employee</label>
                                <input type="number" class="form-control" id="employee" name="employee"
                                    value="{{ $company->employee ?? '' }}">
                            </div>


                            <!-- Upload File for Verification -->
                            <div class="mb-3">
                                <label for="verification_file" class="form-label">Upload Verification</label>
                                <input type="file" class="form-control" id="verification_file" name="verification_file">
                            </div>

                            <!-- Moto Field -->
                            <div class="mb-3">
                                <label for="moto" class="form-label">Moto</label>
                                <input type="text" class="form-control" id="moto" name="moto" value="{{ auth()->user()->moto }}">
                            </div>

                            <!-- Avatar Field -->
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Job -->
        <!-- <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addJobModalLabel">Tambah Lowongan Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('company-job-work.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pekerjaan</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Gaji</label>
                                <input type="number" class="form-control" id="salary" name="salary" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Tanggal Berakhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <div class="mb-3">
                                <label for="work_type_id" class="form-label">Tipe Pekerjaan</label>
                                <select class="form-select" id="work_type_id" name="work_type_id" required>
                                    @foreach($workTypes as $workType)
                                    <option value="{{ $workType->id }}">{{ $workType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="work_method_id" class="form-label">Metode Pekerjaan</label>
                                <select class="form-select" id="work_method_id" name="work_method_id" required>
                                    @foreach($workMethods as $workMethod)
                                    <option value="{{ $workMethod->id }}">{{ $workMethod->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="job_role_id" class="form-label">Peran Pekerjaan</label>
                                <select class="form-select" id="job_role_id" name="job_role_id" required>
                                    @foreach($jobRoles as $jobRole)
                                    <option value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="skill_job_id" class="form-label">Keahlian</label>
                                <select class="form-select skill-select" id="skill_job_id" name="skill_job_id[]" multiple="multiple" required>
                                    @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div> -->

        <!-- Modal Description -->
        <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="descriptionModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5">{{ auth()->user()->description }}</textarea>
                            </div>
                            <input type="hidden" name="corporateField" value="{{ $company->corporate_field_id }}">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sosmed Modal -->
        <div class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="addEditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEditModalLabel">Tambah/Edit Sosial Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('social-media.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $company->user->socialMedia->instagram ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="github" class="form-label">GitHub</label>
                                <input type="text" class="form-control" id="github" name="github" value="{{ old('github', $company->user->socialMedia->github ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $company->user->socialMedia->youtube ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $company->user->socialMedia->website ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $company->user->socialMedia->linkedin ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="tiktok" class="form-label">TikTok</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $company->user->socialMedia->tiktok ?? '') }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work Time Modal -->
        <div class="modal fade" id="workTimeModal" tabindex="-1" aria-labelledby="workTimeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="workTimeModalLabel">Tambah/Edit Jam Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="workTimeForm" method="POST" action="{{ route('work-time.store') }}">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <!-- Senin -->
                            <div class="mb-3">
                                <label for="monday" class="form-label">Senin</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="monday_in" name="monday_in" value="{{ old('monday_in', substr($company->workTimes->monday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="monday_out" name="monday_out" value="{{ old('monday_out', substr($company->workTimes->monday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Selasa -->
                            <div class="mb-3">
                                <label for="tuesday" class="form-label">Selasa</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="tuesday_in" name="tuesday_in" value="{{ old('tuesday_in', substr($company->workTimes->tuesday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="tuesday_out" name="tuesday_out" value="{{ old('tuesday_out', substr($company->workTimes->tuesday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Rabu -->
                            <div class="mb-3">
                                <label for="wednesday" class="form-label">Rabu</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="wednesday_in" name="wednesday_in" value="{{ old('wednesday_in', substr($company->workTimes->wednesday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="wednesday_out" name="wednesday_out" value="{{ old('wednesday_out', substr($company->workTimes->wednesday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Kamis -->
                            <div class="mb-3">
                                <label for="thursday" class="form-label">Kamis</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="thursday_in" name="thursday_in" value="{{ old('thursday_in', substr($company->workTimes->thursday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="thursday_out" name="thursday_out" value="{{ old('thursday_out', substr($company->workTimes->thursday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Jumat -->
                            <div class="mb-3">
                                <label for="friday" class="form-label">Jumat</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="friday_in" name="friday_in" value="{{ old('friday_in', substr($company->workTimes->friday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="friday_out" name="friday_out" value="{{ old('friday_out', substr($company->workTimes->friday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Sabtu -->
                            <div class="mb-3">
                                <label for="saturday" class="form-label">Sabtu</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="saturday_in" name="saturday_in" value="{{ old('saturday_in', substr($company->workTimes->saturday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="saturday_out" name="saturday_out" value="{{ old('saturday_out', substr($company->workTimes->saturday ?? '', 6)) }}">
                                </div>
                            </div>

                            <!-- Minggu -->
                            <div class="mb-3">
                                <label for="sunday" class="form-label">Minggu</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="sunday_in" name="sunday_in" value="{{ old('sunday_in', substr($company->workTimes->sunday ?? '', 0, 5)) }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="sunday_out" name="sunday_out" value="{{ old('sunday_out', substr($company->workTimes->sunday ?? '', 6)) }}">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Galery -->
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Edit Galeri Perusahaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company->id }}">

                            <div class="row">
                                @for ($i = 1; $i <= 6; $i++)
                                    @php
                                    $column='image' . $i;
                                    // Ambil path gambar dari gallery yang aktif jika tersedia
                                    $imagePath=isset($company->galleries[0]) && $company->galleries[0]->$column
                                    ? Storage::url('gallery_images/' . $company->galleries[0]->$column)
                                    : '';
                                    @endphp

                                    <div class="col-md-4 mb-3">
                                        <label for="image{{ $i }}" class="form-label">Gambar {{ $i }}</label>
                                        <input type="file" class="form-control" id="image{{ $i }}" name="images[]" accept="image/*">
                                        <!-- Preview gambar -->
                                        <div class="mt-2 position-relative">
                                            <img id="preview{{ $i }}"
                                                src="{{ $imagePath }}"
                                                data-default="{{ $imagePath }}"
                                                alt="Preview"
                                                class="image-preview"
                                                style="width: 100%; height: 150px; object-fit: cover; border: 1px solid #ccc;">

                                            <!-- Tombol Hapus -->
                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image"
                                                data-preview="preview{{ $i }}"
                                                data-input="image{{ $i }}"
                                                data-hidden="deleted{{ $i }}">
                                                &times;
                                            </button>
                                            <input type="hidden" name="deleted_images[]" id="deleted{{ $i }}" value="false">
                                        </div>
                                    </div>
                                    @endfor
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setupImagePreview() {
            for (let i = 1; i <= 6; i++) {
                const inputFile = document.getElementById(`image${i}`);
                const previewImage = document.getElementById(`preview${i}`);
                const deleteButton = document.querySelector(`[data-preview="preview${i}"]`);
                const hiddenInput = document.getElementById(`deleted${i}`);
                const defaultSrc = previewImage.getAttribute('data-default');

                // Tampilkan atau sembunyikan gambar dan tombol hapus berdasarkan defaultSrc
                if (!defaultSrc) {
                    previewImage.style.display = 'none';
                    deleteButton.style.display = 'none';
                }

                // Event saat file dipilih
                inputFile.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewImage.style.display = 'block';
                            deleteButton.style.display = 'block';
                            hiddenInput.value = 'false';
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Event untuk tombol hapus
                deleteButton.addEventListener('click', function() {
                    inputFile.value = '';
                    previewImage.src = '';
                    previewImage.style.display = 'none';
                    deleteButton.style.display = 'none';
                    hiddenInput.value = 'true';
                });
            }
        }

        const galleryModal = document.getElementById('galleryModal');

        galleryModal.addEventListener('shown.bs.modal', setupImagePreview);
    });
</script>
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
    document.addEventListener("DOMContentLoaded", function() {
        const locationInput = document.getElementById("location");
        const suggestionsBox = document.getElementById("location-suggestions");

        let cities = [];

        async function fetchCities() {
            const provinceIds = [
                11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 31, 32, 33, 34, 35, 36, 51, 52, 53, 61, 62, 63, 64, 65, 71, 72, 73, 74, 75, 76, 81, 82, 91, 92
            ];

            for (let provinceId of provinceIds) {
                try {
                    let response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`);
                    let data = await response.json();
                    cities = [...cities, ...data];
                } catch (error) {
                    console.error(`Error fetching cities for province ${provinceId}:`, error);
                }
            }
        }

        function showSuggestions(query) {
            const filteredCities = cities.filter(city => city.name.toLowerCase().includes(query.toLowerCase()));

            suggestionsBox.innerHTML = "";
            if (filteredCities.length > 0) {
                suggestionsBox.style.display = "block";

                filteredCities.forEach(city => {
                    let suggestionItem = document.createElement("div");
                    suggestionItem.classList.add("list-group-item", "list-group-item-action");
                    suggestionItem.textContent = city.name;
                    suggestionItem.onclick = function() {
                        locationInput.value = city.name;
                        suggestionsBox.style.display = "none";
                    };
                    suggestionsBox.appendChild(suggestionItem);
                });
            } else {
                suggestionsBox.style.display = "none";
            }
        }

        locationInput.addEventListener("input", function() {
            let query = this.value.trim();
            if (query.length > 2) {
                showSuggestions(query);
            } else {
                suggestionsBox.style.display = "none";
            }
        });

        document.addEventListener("click", function(e) {
            if (!suggestionsBox.contains(e.target) && e.target !== locationInput) {
                suggestionsBox.style.display = "none";
            }
        });

        fetchCities();
    });
    Fancybox.bind("[data-fancybox]", {
        Toolbar: {
            display: ["zoom", "close"],
        },
    });
</script>

</html>