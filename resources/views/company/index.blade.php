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
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px; border: 1px solid #ddd;">
                            <img src="https://via.placeholder.com/50" alt="Placeholder Image" class="img-fluid">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <h3 class="fw-bold">{{$company->user->name}}</h3>
                        <p>{{$company->user->description}}</p>
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
                                    <p class="card-text">{{$company->employee}}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-check" style="width: 24px;"></i>
                                    <p class="card-text">{{$company->status_verification}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card p-3 shadow-sm border-0">
                <h5 class="fw-bold">Lowongan Pekerjaan</h5>
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="card shadow-sm border-0 flex-grow-1">
                            <div class="card-body">
                                <!-- Job Title and Salary -->
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-2">Full Stack Developer (Project Based)</h5>
                                    <p class="text-primary fw-semibold mb-1">Rp 10 jt - 11 jt</p>
                                </div>
                                <!-- Job Tags -->
                                <div class="d-flex flex-wrap mb-2 gap-1">
                                    <span class="badge bg-secondary p-2">Hybrid</span>
                                    <span class="badge bg-secondary p-2">Kontrak</span>
                                    <span class="badge bg-secondary p-2">3 – 5 tahun</span>
                                    <span class="badge bg-secondary p-2">Minimal Sarjana (S1)</span>
                                    <span class="badge bg-secondary p-2">+13</span>
                                </div>
                                <!-- Company Info -->
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://via.placeholder.com/50" alt="Company Logo" class="rounded me-2">
                                    <div>
                                        <p class="mb-0 text-primary fw-semibold">PT Eureka Merdeka Indonesia (SMKDEV)</p>
                                        <p class="mb-0 text-muted">Menteng, Jakarta Pusat, DKI Jakarta</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- Footer -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Kandidat Pelamar</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card shadow-sm border-0 flex-grow-1">
                            <div class="card-body">
                                <!-- Job Title and Salary -->
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-2">Full Stack Developer (Project Based)</h5>
                                    <p class="text-primary fw-semibold mb-1">Rp 10 jt - 11 jt</p>
                                </div>
                                <!-- Job Tags -->
                                <div class="d-flex flex-wrap mb-2 gap-1">
                                    <span class="badge bg-secondary p-2">Hybrid</span>
                                    <span class="badge bg-secondary p-2">Kontrak</span>
                                    <span class="badge bg-secondary p-2">3 – 5 tahun</span>
                                    <span class="badge bg-secondary p-2">Minimal Sarjana (S1)</span>
                                    <span class="badge bg-secondary p-2">+13</span>
                                </div>
                                <!-- Company Info -->
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://via.placeholder.com/50" alt="Company Logo" class="rounded me-2">
                                    <div>
                                        <p class="mb-0 text-primary fw-semibold">PT Eureka Merdeka Indonesia (SMKDEV)</p>
                                        <p class="mb-0 text-muted">Menteng, Jakarta Pusat, DKI Jakarta</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- Footer -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Kandidat Pelamar</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold">Deskripsi Perusahaan</h5>
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
            <div class="card shadow-sm border-0 p-3">
                <div class="d-flex justify-content-between w-100">
                    <h5 class="fw-bold">Galeri Perusahaan</h5>
                    <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <div class="row g-4">
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/500" alt="Company Galeri" class="rounded w-100">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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

    </section>
</body>

</html>