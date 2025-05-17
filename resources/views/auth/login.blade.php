<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
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
</head>

<body>
    <section>
        <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <!-- <div class="d-flex bg-white flex-row px-3 py-2 mb-3 rounded-pill align-items-center justify-content-center">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <p class="text-muted p-0 mx-2 mb-0">SISTEM MAHASISWA BERKARIR</p>
                <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50px;">
            </div> -->
            <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 200px;">
            <div class="d-flex flex-column mb-3 align-items-center justify-content-center">
                <h1 class="text-center fw-bold w-75 mb-2">Mahasiswa Berkarir - Temukan Lowongan Magang & Kerja yang Cocok untuk Kamu</h1>
                <p>Rekomendasi cerdas sesuai minat dan keahlianmu.</p>
            </div>
            <div class="d-flex gap-3 align-items-center justify-content-center">
                <a class="btn btn-dark w-100 py-3 text-white mb-4 rounded-pill col-md-4" href="{{ url('login/google?role=user') }}">Cari Kerja</a>
                <a class="btn btn-outline-primary w-100 py-3 mb-4 rounded-pill col-md-4" href="{{ url('login/google?role=company') }}">Pasang Lowongan</a>
            </div>
        </div>
    </section>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Login dengan Google -->
</body>

</html>