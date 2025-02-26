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
                            <a class="nav-link fw-semibold" href="/user-profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-job-work">Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary fw-bold" href="/user-company">Perusahaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/apply">Lamaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/favorite">Disimpan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container my-2">
            <div class="alert bg-white border border-1 border-primary alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                Hallo <span class="text-primary fw-bold">{{auth()->user()->name}} 👋</span>. Kamu bisa lihat semua perusahaan yang terdaftar disini.
            </div>
        </div>
        <div class="container py-3">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="search-container">
                            <input type="text" class="form-control search-input" placeholder="Search...">
                            <i class="ph-duotone ph-magnifying-glass search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                @if ($companies->count() > 0)
                @foreach ($companies as $company)
                <!-- Card 1 -->
                <div class="col-md-4">
                    <a href="{{ route('user-company.show', $company->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="card h-100 border border-1 border-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    @if ($company->user->avatar)
                                    <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Company Image" style="max-width: 50px; max-height: 50px; width:100%; height:100%; object-fit: cover; border: 1px solid #ddd;" class="img-fluid rounded-2 me-2">
                                    @else
                                    <img src="{{ asset('assets/img/default-user.png') }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 45px; height: 45px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <h5 class="card-title text-dark fw-semibold">{{ $company->user->name }}</h5>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="ph-duotone ph-map-pin"></i>
                                            <small class="card-text text-muted">{{ $company->user->location }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-buildings" style="width: 24px;"></i>
                                    <p class="card-text"><strong>{{ $company->corporateField->name }}</strong></p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-read-cv-logo" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->jobWorks->count() }} lowongan</p>
                                </div>
                                <hr>
                                <small class="card-text text-muted">{{ $company->employee }} Karyawan</small>
                            </div>
                        </div>
                    </a>
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
                        <li class="page-item">
                            <a class="page-link active p-2" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link p-2" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link p-2" href="#">3</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</body>

</html>