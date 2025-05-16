<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perusahaan</title>
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
            <a class="navbar-brand" href="#" class="action"><i class="ph-duotone ph-book"></i></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work/create">Upload Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work">List Pekerjaan</a>
                        </li>
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
                            <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Image" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover; border: 1px solid #ddd;" class="img-fluid rounded-2">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <h3 class="fw-bold">{{ $jobWork->name }}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-buildings text-primary" style="width: 24px;"></i>
                                    <p class="card-text fw-semibold">{{ $jobWork->company->user->name }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-buildings text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $jobWork->company->corporateField->name}} - {{ $jobWork->jobRole->name}}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-money text-primary" style="width: 24px;"></i>
                                    <p class="card-text">
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
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-clock text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $jobWork->workType->name }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-briefcase text-primary" style="width: 24px;"></i>
                                    <p class="card-text">{{ $jobWork->workMethod->name }}</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-seal-check" style="width: 24px; color: blue;"></i>
                                    @if ($jobWork->company->status_verification == 0)
                                    <span class="badge bg-secondary p-2">Belum Terverifikasi</span>
                                    @elseif ($jobWork->company->status_verification == 1)
                                    <span class="badge bg-success p-2" style="background-color: blue !important;">Terverifikasi</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="mt-3">
                            <button class="btn btn-sm btn-outline-primary fw-semibold" id="shareButton">
                                <i class="fa-solid fa-share-from-square me-2"></i>Bagikan
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Skills Section -->
                <div class="d-flex flex-wrap gap-2 justify-content-center text-center">
                    @foreach($jobWork->skillJobs as $skill)
                    <span class="badge badge-outline-primary p-2">{{ $skill->skill->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card border-1 border-primary p-3">
                <h5 class="fw-bold">Kandidat Pelamar - <span class="fw-normal">{{ count($candidates) }} pelamar</span></h5>
                @if (count($candidates) > 0)
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="ph-duotone ph-users text-primary" style="width: 24px;"></i>
                        <p class="card-text fw-semibold">Kandidat Pelamar</p>
                    </div>
                    <a href="#" class="btn btn-sm btn-primary mb-3 text-white p-2">Lihat Semua Kandidat</a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach($candidates as $candidate)
                    <div class="col">
                        <a href="{{ route('candidates.show', $candidate->id) }}" class="text-decoration-none text-dark">
                            <div class="card border-1 p-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="d-flex align-items-center w-100">
                                    <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                        <img class="rounded-circle bg-light" style="width: 50px; height: 50px;"
                                            src="{{ asset('storage/avatars/' . $candidate->user->avatar) }}" alt="">
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1 fw-bold">{{ $candidate->user->name }}</h6>
                                        <a href="{{ asset('storage/' . $candidate->cv) }}" class="text-muted">Download CV</a>
                                    </div>
                                </div>
                                <select class="form-select update-status w-25" data-id="{{ $candidate->id }}">
                                    @foreach(\App\Models\Candidate::getAvailableStatuses() as $value => $label)
                                    <option value="{{ $value }}" {{ $candidate->status == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center">
                    <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-25" alt="">
                    <p class="text-center">Belum ada kandidat pelamar untuk lowongan ini</p>
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

        <div class="container mt-4">
            <div class="card border-1 border-primary p-3 border-1 border-primary">
                <h5 class="fw-bold">Informasi Pekerjaan</h5>
                <div class="card border-1 p-3">
                    <!-- Syarat/Kualifikasi Section -->
                    <h5 class="card-title">Syarat / Kualifikasi</h5>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled">
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-calendar text-primary" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Pengalaman</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: {{ $jobWork->qualification->work_experience}} Tahun</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-graduation-cap text-primary" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Pendidikan</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: {{ $jobWork->qualification->education->name}}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-chalkboard text-primary" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Jurusan</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: {{ $jobWork->qualification->major}}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-notebook text-primary" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">IPK</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: {{ $jobWork->qualification->ipk}}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-flag text-primary" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Toefl</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: {{ $jobWork->qualification->toefl}}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-1 p-3 mt-3">
                    <!-- Deskripsi Pekerjaan Section -->
                    <h5 class="card-title">Deskripsi Pekerjaan</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="text">
                                {!! $jobWork->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast Container -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong id="toastTitle" class="me-auto">Aksi</strong>
                    <small>Baru saja</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastMessage">
                    <!-- Pesan akan dinamis diubah melalui JS -->
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".update-status").change(function() {
            let candidateId = $(this).data("id");
            let newStatus = $(this).val();
            let token = "{{ csrf_token() }}";

            $.ajax({
                url: "/candidates/" + candidateId,
                type: "PUT",
                data: {
                    _token: token,
                    status: newStatus
                },
                success: function(response) {
                    alert("Status berhasil diperbarui menjadi: " + newStatus);
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan. Silakan coba lagi.");
                }
            });
        });
    });

    function showToast(message, type, title) {
        $('#toastTitle').text(title || 'Favorit');
        $('#toastMessage').text(message);

        var toast = new bootstrap.Toast($('#liveToast')[0]);
        toast.show();
    }

    document.getElementById('shareButton').addEventListener('click', function() {
        const jobWorkId = "{{ $jobWork->id }}";
        const baseUrl = window.location.origin;
        const urlToCopy = `${baseUrl}/job-work/${jobWorkId}`;

        navigator.clipboard.writeText(urlToCopy)
            .then(() => {
                showToast('Link telah disalin ke clipboard!', 'success', 'Link Disalin');
            })
            .catch((error) => {
                console.error('Gagal menyalin: ', error);
                showToast('Gagal menyalin link', 'error', 'Kesalahan');
            });
    });
</script>


</html>