<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Perusahaan</title>
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
        <div class="container mt-4">
            <div class="card p-3 shadow-sm border-0">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px; border: 1px solid #ddd;">
                            <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Profile Avatar" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover;" class="img-fluid rounded-2 shadow-sm">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <h3 class="fw-bold">{{ $company->user->name }}</h3>
                        <p>{{ $company->user->moto }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-location-dot" style="width: 24px;"></i>
                                    <p class="card-text fw-semibold">{{ $company->user->location }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-building" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->corporateField->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-users" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->employee }}</p>
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
                <h5 class="fw-bold">Lowongan Pekerjaan</h5>
                <div class="row g-4" id="job-list">
                    @foreach ($jobWorks as $jobWork)
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="card shadow-sm border-0 w-100 h-100">
                            <a class="card-body d-flex flex-column" href="{{ route('user-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">
                                <div class="d-flex justify-content-between gap-2">
                                    <h5 class="card-title text-truncate" style="width: 85%;">
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
                                <div class="d-flex flex-column flex-grow-1">
                                    <div class="d-flex flex-wrap mb-3 gap-1">
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
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold">Deskripsi Perusahaan</h5>
                <div class="text">
                    {!! $company->user->description !!}
                </div>
            </div>
        </div>

        <div class="container my-4">
            <div class="card shadow-sm border-0 p-4">
                <h5 class="fw-bold">Informasi Perusahaan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100 p-3">
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
                        <div class="card shadow-sm border-0 h-100 p-3">
                            <h6 class="mb-3">Informasi Lainnya</h6>
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
                                style="max-height: 500px; max-width: 500px; width: 100%; height: 100%; object-fit: cover;"
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