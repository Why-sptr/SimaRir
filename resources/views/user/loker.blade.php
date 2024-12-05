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
    <header class="p-3">
        <nav class="navbar bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
                </a>
            </div>
        </nav>
    </header>
    <section>

        <div class="container my-5">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-md-3">
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

                        <div class="mb-4">
                            <h5 class="fw-bold">Value</h5>
                            <div class="position-relative">
                                <input type="range" class="form-range custom-range" id="range-slider" min="0" max="100"
                                    step="1" />
                                <div id="slider-value" class="slider-label position-absolute">
                                    50
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-dark fw-bold">Label</span>
                                <span class="text-dark fw-bold">Label</span>
                            </div>
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
                        <button class="btn-web1 w-100">Terapkan</button>
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
                                        <h5 class="card-title fw-bold mb-1">Full Stack Developer (Project Based)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 10 jt - 11 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Hybrid</span>
                                        <span class="badge bg-secondary me-2">Kontrak</span>
                                        <span class="badge bg-secondary me-2">3 – 5 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Sarjana (S1)</span>
                                        <span class="badge bg-secondary">+13</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Eureka Merdeka Indonesia (SMKDEV)</p>
                                            <p class="mb-0 text-muted">Menteng, Jakarta Pusat, DKI Jakarta</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">3 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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
                                        <h5 class="card-title fw-bold mb-1">Frontend Developer (Remote)</h5>
                                        <p class="text-primary fw-bold mb-1">Rp 8 jt - 10 jt</p>
                                    </div>
                                    <!-- Job Tags -->
                                    <div class="d-flex flex-wrap mb-2">
                                        <span class="badge bg-secondary me-2">Remote</span>
                                        <span class="badge bg-secondary me-2">Freelance</span>
                                        <span class="badge bg-secondary me-2">1 – 3 tahun</span>
                                        <span class="badge bg-secondary me-2">Minimal Diploma (D3)</span>
                                        <span class="badge bg-secondary">+8</span>
                                    </div>
                                    <!-- Company Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://via.placeholder.com/30" alt="Company Logo" class="rounded me-2">
                                        <div>
                                            <p class="mb-0 text-primary fw-bold">PT Teknologi Nusantara</p>
                                            <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark"></i>
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

        <!-- Toast -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="" class="rounded me-2" id="toast-product-img"
                        style="width: 40px; height: 40px; object-fit: cover;" alt="...">
                    <strong class="me-auto" id="toast-product-name">Notifikasi</strong>
                    <small class="text-muted">Sekarang</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toast-message">
                    Produk berhasil ditambahkan ke keranjang!
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-web1 text-light p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-flex flex-column">
                    <a href="#" class="d-flex align-items-center mb-3 text-light text-decoration-none">
                        <img src="Image/Logo Head.png" alt="Logo" width="40" class="me-2">
                        <span class="fw-bold text-logo-footer">Beauty Shop</span>
                    </a>
                    <p class="mb-0">Copyright 2024 Beauty Shop.</p>
                </div>
                <div class="col-md-6 align-self-end">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-light" data-bs-toggle="modal"
                                data-bs-target="#privacyModal">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-light" data-bs-toggle="modal"
                                data-bs-target="#termsModal">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-light" data-bs-toggle="modal"
                                data-bs-target="#cookieModal">Cookie Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-light" data-bs-toggle="modal"
                                data-bs-target="#contactModal">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This is the Privacy Policy content. You can replace this with your actual privacy policy text.
                </div>
            </div>
        </div>
    </div>

    <!-- Terms & Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This is the Terms & Conditions content. You can replace this with your actual terms and conditions
                    text.
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Policy Modal -->
    <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cookieModalLabel">Cookie Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This is the Cookie Policy content. You can replace this with your actual cookie policy text.
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Feel free to contact us via the following methods:</p>
                    <ul>
                        <li>Email: contact@beautyshop.com</li>
                        <li>Phone: +123 456 789</li>
                        <li>Address: UPGRIS Raya</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>