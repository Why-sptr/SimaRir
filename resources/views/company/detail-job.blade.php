<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perusahaan</title>
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
            <div class="card shadow-sm border-0 p-3 shadow-sm border-0 shadow-sm border-0">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px; border: 1px solid #ddd;">
                            <img src="https://via.placeholder.com/50" alt="Placeholder Image" class="img-fluid">
                        </div>
                    </div>
                    <!-- Text and Details Section -->
                    <div class="col-md-8">
                        <h3 class="fw-bold">Nama Lowongan</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-building" style="width: 24px;"></i>
                                    <p class="card-text fw-semibold">Perusahaan</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-building" style="width: 24px;"></i>
                                    <p class="card-text">Bidang Perusahaan - Bidang Pekerjaan</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-money-bill" style="width: 24px;"></i>
                                    <p class="card-text">Salary</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-clock" style="width: 24px;"></i>
                                    <p class="card-text">Tipe Pekerjaan</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-briefcase" style="width: 24px;"></i>
                                    <p class="card-text">Metode Pekerjaan</p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-check" style="width: 24px;"></i>
                                    <p class="card-text">Verifikasi Perusahaan</p>
                                </div>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="mt-3">
                            <button class="btn btn-primary fw-semibold">Lamar</button>
                            <button class="btn btn-outline-primary fw-semibold"><i class="fa-solid fa-share-from-square me-2"></i>Bagikan</button>
                            <button class="btn btn-outline-primary fw-semibold"><i class="fa-regular fa-bookmark me-2"></i>Favorit</button>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Skills Section -->
                <div class="d-flex flex-wrap gap-2 justify-content-center text-center">
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                    <span class="badge bg-secondary text-light p-2">Skill Pekerjaan</span>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold">Kandidat Pelamar - <span class="fw-normal">Jumlah pelamar</span></h5>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <!-- Kandidat Card -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Ulangi kandidat card sesuai jumlah kandidat -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Ulangi kandidat card sesuai jumlah kandidat -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Ulangi kandidat card sesuai jumlah kandidat -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Ulangi kandidat card sesuai jumlah kandidat -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Ulangi kandidat card sesuai jumlah kandidat -->
                    <div class="col">
                        <div class="card shadow-sm border-0 p-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span class="text-secondary">👤</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-bold">Nama Pelamar</h6>
                                    <p class="mb-0 text-muted">Resume File/CV</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-sm">Ubah Status</button>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak kandidat seperti di atas -->
                </div>
                <!-- Pagination -->
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow-sm border-0 p-3 shadow-sm border-0">
                <h5 class="fw-bold">Informasi Pekerjaan</h5>
                <div class="card shadow-sm border-0 p-3 shadow-sm border-0">
                    <!-- Syarat/Kualifikasi Section -->
                    <h5 class="card-title">Syarat / Kualifikasi</h5>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled">
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-calendar-day" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Pengalaman</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: 3-5 Tahun</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-graduation-cap" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Pendidikan</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: 3-5 Tahun</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-laptop-file" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Jurusan</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: 3-5 Tahun</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-book" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">IPK</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: 3-5 Tahun</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-2 col-md-2">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-font-awesome" style="width: 24px;"></i>
                                            <p class="card-text fw-semibold">Toefl</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-auto">
                                        <span class="ms-auto">: 3-5 Tahun</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 p-3 shadow-sm border-0 mt-3">
                    <!-- Deskripsi Pekerjaan Section -->
                    <h5 class="card-title">Deskripsi Pekerjaan</h5>
                    <div class="row">
                        <div class="col-12">
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                                a galley of type and scrambled it to make a type.
                            </p>
                            <ul>
                                <li>when an unknown printer took a galley</li>
                                <li>when an unknown printer took a galley</li>
                                <li>when an unknown printer took a galley</li>
                                <li>when an unknown printer took a galley</li>
                                <li>when an unknown printer took a galley</li>
                            </ul>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                                a galley of type and scrambled it to make a type. Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>