<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lamaran Saya</title>
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
        <div class="container mt-4 text-center">
            <h3 class="fw-bold">Lamaran Saya</h3>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-dark w-100 d-md-none mb-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarContent" aria-expanded="false" aria-controls="sidebarContent">
                        Filter
                    </button>
                    <div class="card shadow-sm border-0 p-3">
                        <div class="collapse d-md-block sticky-sidebar" id="sidebarContent">
                            <!-- Jenis Section -->
                            <div class="mb-4">
                                <h5 class="fw-bold">Filter Lamaran</h5>
                                <form>
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox" value=""
                                            id="checkbox1">
                                        <label class="form-check-label" for="checkbox1">
                                            Whitening
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox" value=""
                                            id="checkbox2">
                                        <label class="form-check-label" for="checkbox2">
                                            Brightening
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox" value=""
                                            id="checkbox3">
                                        <label class="form-check-label" for="checkbox3">
                                            Brightening
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox" value=""
                                            id="checkbox4">
                                        <label class="form-check-label" for="checkbox4">
                                            Brightening
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox" value=""
                                            id="checkbox5">
                                        <label class="form-check-label" for="checkbox5">
                                            Brightening
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary w-100">Terapkan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row g-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                        </div>
                        @foreach ($candidates as $candidate)
                        <div class="col-12 d-flex">
                            <div class="card shadow-sm border-0 flex-grow-1">
                                <a href="{{ route('user-job-work.show', $candidate->jobWork->id) }}" class="card-body" style="text-decoration: none; color: inherit;">
                                    <!-- Job Title and Salary -->
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold mb-2">{{ $candidate->jobWork->name }}</h5>
                                        <p class="text-primary fw-semibold mb-1">Rp {{ number_format($candidate->jobWork->salary, 0, ',', '.') }}</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-3 gap-1">
                                        <span class="badge bg-secondary p-2">{{ $candidate->jobWork->workMethod->name }}</span>
                                        <span class="badge bg-secondary p-2">{{ $candidate->jobWork->workType->name }}</span>
                                        <span class="badge bg-secondary p-2">{{ $candidate->jobWork->qualification->work_experience }} Tahun</span>
                                        <span class="badge bg-secondary p-2">{{ $candidate->jobWork->qualification->education->name }}</span>
                                        @if ($candidate->jobWork->qualification->major)
                                        <span class="badge bg-secondary p-2">{{ $candidate->jobWork->qualification->major }}</span>
                                        @endif
                                        @if ($candidate->jobWork->qualification->ipk)
                                        <span class="badge bg-secondary p-2">IPK {{ $candidate->jobWork->qualification->ipk }}</span>
                                        @endif
                                        <span class="badge bg-secondary p-2">+ {{ $candidate->jobWork->skillJobs->count() + 1 }}</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('storage/avatars/' . $candidate->jobWork->company->user->avatar) }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">{{ $candidate->jobWork->company->name }}</p>
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">{{ $candidate->jobWork->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <span class="badge bg-secondary px-3 py-2">{{ ucfirst($candidate->status) }}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>