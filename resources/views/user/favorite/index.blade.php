<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Disimpan</title>
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
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container p-3">
            <a class="navbar-brand" href="#" class="action"><img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50px;"></i></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav gap-3 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-job-work">Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-company">Perusahaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/apply">Lamaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary fw-bold" href="/favorite">Disimpan</a>
                        </li>
                        <li class="nav-item dropdown pe-3">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                @if ($user->avatar)
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Profile Avatar" style="width: 35px; height: 35px; object-fit: cover" class="rounded-circle border border-1 border-primary">
                                @else
                                <img src="{{ asset('assets/img/default-user.png') }}" alt="Profile Avatar" style="width: 35px; height: 35px; object-fit: cover" class="rounded-circle border border-1 border-primary">
                                @endif
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->name }}</span>
                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile p-2">
                                <li class="dropdown-header">
                                    <h6>{{ $user->name }}</h6>
                                    <span>{{ $user->jobRole->name }}</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/user-profile">
                                        <i class="bi bi-person"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="https://wa.me/62895381252534" target="_blank">
                                        <i class="bi bi-question-circle"></i>
                                        <span>Butuh Bantuan?</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/logout">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Keluar</span>
                                    </a>
                                </li>

                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container my-2">
            <div class="alert bg-white border border-1 border-primary alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                Hallo <span class="text-primary fw-bold">{{auth()->user()->name}} 👋</span>. Lihat pekerjaan yang sudah kamu simpan disini ya.
            </div>
        </div>
        <div class="container py-3">
            <div class="col-md-12">
                <!-- Produk -->
                <div class="row g-3">
                    <!-- Card 1 -->
                    @if ($jobWorks->count() > 0)
                    @foreach ($jobWorks as $jobWork)
                    @php
                    $isExpired = \Carbon\Carbon::parse($jobWork->end_date)->lt(\Carbon\Carbon::now());
                    @endphp
                    <div class="col-md-4 mb-4 d-flex">
                        <div class="card border-1 border-primary w-100 h-100 {{ $isExpired ? 'bg-secondary bg-opacity-25' : 'bg-white' }}">
                            <a class="card-body d-flex flex-column" href="{{ route('user-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">
                                <div class="d-flex justify-content-between gap-2 px-3 mt-3">
                                    <h5 class="card-title text-truncate text-dark fw-semibold col-md-9">{{ $jobWork->name }}</h5>
                                    <p class="text-primary fw-semibold col-md-2 text-end">
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
                                    <div class="d-flex flex-wrap mb-3 gap-1 px-3">
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->workMethod->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->workType->name }}</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->work_experience }} Tahun</span>
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->education->name }}</span>
                                        @if ($jobWork->qualification->major)
                                        <span class="badge badge-outline-primary p-2">{{ $jobWork->qualification->major }}</span>
                                        @endif
                                        @if ($jobWork->qualification->ipk)
                                        <span class="badge badge-outline-primary p-2">IPK {{ $jobWork->qualification->ipk }}</span>
                                        @endif
                                        <span class="badge badge-outline-primary p-2">+ {{ $jobWork->skillJobs->count() + 1 }}</span>
                                    </div>

                                    <div class="mt-auto">
                                        <div class="d-flex align-items-center px-3">
                                            @if ($jobWork->company->user->avatar)
                                            <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                            <img src="{{ asset('assets/img/default-user.png') }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 45px; height: 45px; object-fit: cover;">
                                            @endif
                                            <div>
                                                <div class="d-flex align-items-center justify-content-center gap-1">
                                                    <p class="mb-0 text-primary fw-semibold text-truncate">{{ $jobWork->company->user->name }}</p>
                                                    @if ($jobWork->company->status_verification == 1)
                                                    <i class="ph-duotone ph-seal-check" style="width: 24px; color: blue;"></i>
                                                    @endif
                                                </div>
                                                <p class="mb-0 text-muted">{{ $jobWork->location }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-3 mx-3 border-primary">
                                        <div class="d-flex justify-content-between align-items-center px-3 mb-3">
                                            <small class="text-muted">{{ count($jobWork->candidates) }} Pelamar</small>
                                            <!-- Tombol favorit dengan ID unik berdasarkan job id -->
                                            <a class="bookmarkButton" style="cursor: pointer;" id="bookmarkButton-{{ $jobWork->id }}" data-job-id="{{ $jobWork->id }}" data-favorite-id="{{ $jobWork->favorite_id }}">
                                                <i class="fa-regular fa-bookmark me-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
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
                            @for ($i = 1; $i <= $jobWorks->lastPage(); $i++)
                                <li class="page-item {{ $jobWorks->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link p-2 {{ $jobWorks->currentPage() == $i ? 'active' : '' }}" href="{{ $jobWorks->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
        <!-- Toast Container -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Favorit</strong>
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
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50px;">
      </a>
      <span class="text-muted">&copy; 2025 Mahasiswa Berkarir, Simarir</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook-f"></i></svg></a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function checkFavoriteStatus(jobId) {
            var userId = '{{ auth()->user()->id }}';
            return $.ajax({
                url: '{{ route("favorite.check", ["jobId" => ":jobId", "userId" => ":userId"]) }}'
                    .replace(':jobId', jobId)
                    .replace(':userId', userId),
                method: 'GET'
            });
        }

        function updateButtonDisplay($button, exists, favoriteId = null) {
            var $icon = $button.find('i');
            if (exists) {
                $icon.removeClass('fa-regular').addClass('fa-solid');
                $button.data('favorite-id', favoriteId);
            } else {
                $icon.removeClass('fa-solid').addClass('fa-regular');
                $button.data('favorite-id', null);
            }
        }

        $('.bookmarkButton').each(function() {
            var jobId = $(this).data('job-id');
            var $button = $(this);

            checkFavoriteStatus(jobId)
                .done(function(response) {
                    updateButtonDisplay($button, response.exists, response.favoriteId);
                })
                .fail(function() {
                    showToast('Terjadi kesalahan saat memeriksa status favorit!', 'error');
                });
        });

        $('.bookmarkButton').on('click', function() {
            var $button = $(this);
            var jobId = $button.data('job-id');
            var userId = '{{ auth()->user()->id }}';

            checkFavoriteStatus(jobId)
                .done(function(response) {
                    if (!response.exists) {
                        $.ajax({
                            url: '{{ route("favorite.store") }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                job_id: jobId,
                                user_id: userId
                            },
                            success: function(response) {
                                if (response.success) {
                                    updateButtonDisplay($button, true, response.favoriteId);
                                    showToast('Pekerjaan berhasil ditambahkan ke favorit!', 'success');
                                } else {
                                    showToast('Gagal menambahkan pekerjaan ke favorit!', 'error');
                                }
                            },
                            error: function() {
                                showToast('Terjadi kesalahan!', 'error');
                            }
                        });
                    } else {
                        $.ajax({
                            url: '{{ route("favorite.destroy", ":favoriteId") }}'.replace(':favoriteId', response.favoriteId),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                job_id: jobId,
                                user_id: userId
                            },
                            success: function(deleteResponse) {
                                if (deleteResponse.success) {
                                    updateButtonDisplay($button, false);
                                    showToast('Pekerjaan berhasil dihapus dari favorit!', 'success');
                                } else {
                                    showToast('Gagal menghapus pekerjaan dari favorit!', 'error');
                                }
                            },
                            error: function() {
                                showToast('Terjadi kesalahan saat menghapus favorit!', 'error');
                            }
                        });
                    }
                })
                .fail(function() {
                    showToast('Terjadi kesalahan saat memeriksa status favorit!', 'error');
                });
        });

        function showToast(message) {
            $('#toastMessage').text(message);
            var toast = new bootstrap.Toast($('#liveToast')[0]);
            toast.show();
        }
    });
</script>

</html>