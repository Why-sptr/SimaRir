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
        <div class="container py-5">
            <div class="d-flex justify-content-center ">
                <div class="input-group mb-3 w-75">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($companies as $company)
                <!-- Card 1 -->
                <div class="col-md-4">
                    <a href="{{ route('user-company.show', $company->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Company Image" style="max-width: 50px; max-height: 50px; width:100%; height:100%; object-fit: cover;" class="img-fluid rounded-2 shadow-sm me-2">
                                    <div>
                                        <h5 class="card-title">{{ $company->user->name }}</h5>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="card-text text-muted">{{ $company->user->location }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-building text-center" style="width: 24px;"></i>
                                    <p class="card-text"><strong>{{ $company->corporateField->name }}</strong></p>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-briefcase text-center" style="width: 24px;"></i>
                                    <p class="card-text">{{ $company->jobWorks->count() }} lowongan</p>
                                </div>
                                <hr>
                                <p class="card-text text-muted">{{ $company->employee }} Karyawan</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</body>

</html>