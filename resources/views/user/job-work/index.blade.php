<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loker</title>
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
        <div class="container my-5">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-3">
                        <button class="btn btn-dark w-100 d-md-none mb-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarContent" aria-expanded="false" aria-controls="sidebarContent">
                            Filter
                        </button>
                        <div class="collapse d-md-block sticky-sidebar" id="sidebarContent">

                            <!-- Jenis Section -->
                            <div class="mb-4">
                                <h5 class="fw-bold">Jenis</h5>
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

                            <!-- Label Section -->
                            <div class="mb-4">
                                <h5 class="fw-bold">Label</h5>
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

                            <!-- Dropdown -->
                            <div class="mb-4">
                                <h5 class="fw-bold">Label</h5>
                                <select class="form-select">
                                    <option selected>Select</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                </select>
                            </div>

                            <!-- Button -->
                            <button class="btn btn-primary w-100">Terapkan</button>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <!-- Produk -->
                    <div class="row g-4">
                        <!-- Card 1 -->
                        @foreach ($jobWorks as $jobWork)
                        <div class="col-md-6 mb-4 d-flex">
                            <div class="card shadow-sm border-0 w-100 h-100">
                                <a class="card-body d-flex flex-column" href="{{ route('user-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">

                                    <div class="d-flex justify-content-between gap-2">
                                        <h5 class="card-title text-truncate">
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
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Logo"
                                                    class="rounded me-2 border border-1"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                <div>
                                                    <p class="mb-0 text-primary fw-semibold">{{ $jobWork->company->user->name }}</p>
                                                    <p class="mb-0 text-muted">{{ $jobWork->location }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <small class="text-muted">Kandidat Pelamar</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        @endforeach

                        <!-- Pagination -->
                        <nav class="mt-4 pagination-web">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link active" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
    </section>

    <script src="script.js"></script>
</body>

</html>