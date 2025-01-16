<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Perusahaan</title>
    <link rel="stylesheet" href="/style.css" />
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
</head>

<body>
    <section>
        @foreach ($companies as $company)
        <div class="container mt-4">
            <div class="card p-3 shadow-sm border-0">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center align-items-center bg-light">
                            <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Profile Avatar" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover;" class="img-fluid rounded-2 shadow-sm">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <h3 class="fw-bold">{{$company->user->name}}</h3>
                        <p>{{$company->user->moto}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-location-dot" style="width: 24px;"></i>
                                    <p class="card-text fw-semibold">{{$company->user->location}}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-building" style="width: 24px;"></i>
                                    <p class="card-text">
                                        {{ $company->corporateField->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-users" style="width: 24px;"></i>
                                    <p class="card-text">{{$company->employee}} Karyawan</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-check" style="width: 24px;"></i>
                                    @if ($company->status_verification == 0)
                                    <span class="badge bg-warning p-2">Belum Terverifikasi</span>
                                    @elseif ($company->status_verification == 1)
                                    <span class="badge bg-success p-2">Terverifikasi</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card p-3 shadow-sm border-0">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold">Lowongan Pekerjaan</h5>
                    <a href="{{ route('company-job-work.create') }}">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <div class="row g-4" id="job-list">
                    @foreach ($jobWorks as $jobWork)
                    <div class="col-md-6 d-flex">
                        <div class="card shadow-sm border-0 flex-grow-1">
                            <a href="{{ route('company-job-work.show', $jobWork->id) }}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title mb-2">{{ $jobWork->name }}</h5>
                                        <p class="text-primary fw-semibold mb-1">Rp {{ number_format($jobWork->salary, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap mb-2 gap-1">
                                        <span class="badge bg-secondary p-2">{{ $jobWork->workMethod->name }}</span>
                                        <span class="badge bg-secondary p-2">{{ $jobWork->workType->name }}</span>
                                        <span class="badge bg-secondary p-2">{{ $jobWork->qualification->work_experience }} Tahun</span>
                                        <span class="badge bg-secondary p-2">{{ $jobWork->qualification->education->name }}</span>
                                        @if ($jobWork->qualification->major)
                                        <span class="badge bg-secondary p-2">{{ $jobWork->qualification->major }}</span>
                                        @endif
                                        @if ($jobWork->qualification->ipk)
                                        <span class="badge bg-secondary p-2">IPK {{ $jobWork->qualification->ipk }}</span>
                                        @endif
                                        <span class="badge bg-secondary p-2">+ {{ $jobWork->skillJobs->count() + 1 }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <p class="mb-0 text-primary fw-semibold">{{ $jobWork->company->user->name }}</p>
                                            <p class="mb-0 text-muted">{{ $jobWork->location }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
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
            <div class="card shadow-sm border-0 p-3">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold">Deskripsi Perusahaan</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <p>
                    {{$company->user->description}}
                </p>
            </div>
        </div>

        <div class="container my-4">
            <div class="card shadow-sm border-0 p-4">
                <h5 class="fw-bold">Informasi Perusahaan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3">Hari dan Jam Kerja</h6>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#workTimeModal">
                                    <i class="fa-solid fa-pen-to-square"></i>
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
                        <div class="card shadow-sm border-0 h-100 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3">Informasi Lainnya</h6>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addEditModal"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <ul class="list-unstyled">
                                {{-- Menampilkan Email Pengguna --}}
                                <li>
                                    <p>
                                        <span class="badge bg-light text-dark">
                                            <i class="fa-solid fa-envelope"></i>
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
                                        <span class="badge bg-light text-dark">
                                            @if ($platform === 'website')
                                            <i class="fa-solid fa-globe"></i> {{-- Ikon untuk Website --}}
                                            @else
                                            <i class="fa-brands fa-{{ $platform }}"></i> {{-- Ikon untuk Platform Lain --}}
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
            <div class="card shadow-sm h-100 border-0 p-3">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold mb-3">Galeri Perusahaan</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
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
                                style="max-height: 500px; max-width: 500px; width: 100%; height: 100%; object-fit: cover;"
                                class="rounded w-100">
                        </div>
                        @endif
                        @endfor
                        @endforeach
                </div>
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
                                <label for="attachment" class="form-label">Upload Verification</label>
                                <input type="file" class="form-control" id="attachment" name="attachment">
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
</script>

</html>