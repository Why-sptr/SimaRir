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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="card-text text-muted">Tangerang, Banten, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Kandidat Pelamar</small>
                                        <button class="btn btn-sm">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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