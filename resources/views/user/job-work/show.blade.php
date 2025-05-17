<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perusahaan</title>
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
              <a class="nav-link fw-semibold" href="/favorite">Disimpan</a>
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
            @php
            $isExpired = \Carbon\Carbon::parse($jobWork->end_date)->lt(\Carbon\Carbon::now());
            @endphp
            @if ($isExpired)
            <span class="badge bg-danger mb-3 p-2">Lowongan Kadaluarsa</span>
            @endif
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
            @php
            $isExpired = \Carbon\Carbon::parse($jobWork->end_date)->lt(\Carbon\Carbon::now());
            @endphp

            <div class="mt-3">
              @if($alreadyApplied)
              <button class="btn btn-sm btn-primary fw-semibold disabled" id="applyButton" data-job-id="{{ $jobWork->id }}">
                <i class="fa-solid fa-check me-2"></i>Dilamar
              </button>
              @elseif($isExpired)
              <button class="btn btn-sm btn-secondary fw-semibold disabled" id="applyButton" data-job-id="{{ $jobWork->id }}">
                <i class="fa-solid fa-clock me-2"></i>Lowongan Berakhir
              </button>
              @else
              <button class="btn btn-sm btn-primary fw-semibold" id="applyButton" data-job-id="{{ $jobWork->id }}">
                Lamar
              </button>
              @endif

              <button class="btn btn-sm btn-outline-primary fw-semibold" id="shareButton">
                <i class="fa-solid fa-share-from-square me-2"></i>Bagikan
              </button>

              <button id="bookmarkButton" class="btn btn-sm btn-outline-primary fw-semibold" data-job-id="{{ $jobWork->id }}">
                <i class="fa-regular fa-bookmark me-2"></i>Favorit
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
            <h3 class="fw-bold">{{ $jobWork->company->user->name }}</h3>
            <p>{{ $jobWork->company->user->moto }}</p>
            <div class="row">
              <div class="col-md-6">
                <div class="d-flex gap-2 align-items-center">
                  <i class="ph-duotone ph-map-pin text-primary" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->user->location }}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="ph-duotone ph-buildings text-primary" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->corporateField->name }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2 align-items-center">
                  <i class="ph-duotone ph-users-three text-primary" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->employee }} Karyawan</p>
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
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="card p-3 border-1 border-primary">
        <h5 class="fw-bold">Rekomendasi Pekerjaan</h5>
        <div class="row g-4">
          @foreach ($jobWorks as $jobWork)
          <div class="col-md-6 mb-4 d-flex">
            <div class="card border-1 border-primary w-100 h-100">
              <a class="card-body d-flex flex-column" href="{{ route('user-job-work.show', $jobWork->id) }}" style="text-decoration: none; color: inherit;">

                <div class="d-flex justify-content-between gap-2 px-3 mt-3">
                  <h5 class="card-title text-truncate fw-semibold" style="width: 80%;">
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
                <div class="d-flex flex-column flex-grow-1 px-3 mb-3">
                  <div class="d-flex flex-wrap mb-3 gap-1">
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
                    <small class="text-muted">{{ count($jobWork->candidates) }} Pelamar</small>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Modal untuk upload CV -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applyModalLabel">Upload CV</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="applyForm" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="cv" class="form-label">Upload CV (PDF)</label>
                <div class="input-group">
                  <input type="file" class="form-control" id="cv" name="cv" accept=".pdf">
                  <button class="btn btn-outline-danger" type="button" id="clearCV">
                    <i class="fa-solid fa-times"></i>
                  </button>
                </div>
                <div id="cvHelp" class="form-text">
                  @if(auth()->user()->attachment && auth()->user()->attachment->cv)
                  CV default akan menggunakan CV profil Anda. Upload CV baru jika ingin menggunakan CV yang berbeda.
                  @else
                  Mohon upload CV Anda (Maksimal 2MB)
                  @endif
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="submitApply">Kirim Lamaran</button>
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
    const $button = $('#bookmarkButton');
    const jobId = $button.data('job-id');
    const userId = '{{ auth()->user()->id }}';
    let favoriteId = null;

    function updateButtonDisplay(isFavorited) {
      if (isFavorited) {
        $button.removeClass('btn-outline-primary').addClass('btn-primary');
        $button.find('i').removeClass('fa-regular').addClass('fa-solid');
      } else {
        $button.removeClass('btn-primary').addClass('btn-outline-primary');
        $button.find('i').removeClass('fa-solid').addClass('fa-regular');
      }
    }

    function checkFavoriteStatus() {
      return $.ajax({
        url: '{{ route("favorite.check", ["jobId" => ":jobId", "userId" => ":userId"]) }}'
          .replace(':jobId', jobId)
          .replace(':userId', userId),
        method: 'GET'
      }).then(function(response) {
        favoriteId = response.exists ? response.favoriteId : null;
        updateButtonDisplay(response.exists);
        return response;
      }).catch(function(error) {
        showToast('Terjadi kesalahan saat mengecek status favorit!', 'error', 'Kesalahan');
        console.error('Error checking favorite status:', error);
      });
    }

    function addToFavorites() {
      return $.ajax({
        url: '{{ route("favorite.store") }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          job_id: jobId,
          user_id: userId
        }
      }).then(function(response) {
        if (response.success) {
          favoriteId = response.favoriteId;
          updateButtonDisplay(true);
          showToast('Pekerjaan berhasil ditambahkan ke favorit!', 'success', 'Favorit Ditambahkan');
        }
      }).catch(function(error) {
        showToast('Gagal menambahkan ke favorit!', 'error', 'Kesalahan');
        console.error('Error adding favorite:', error);
      });
    }

    function removeFromFavorites() {
      if (!favoriteId) {
        showToast('ID Favorit tidak ditemukan!', 'error', 'Kesalahan');
        return Promise.reject('Favorite ID not found');
      }

      return $.ajax({
        url: '{{ route("favorite.destroy", ":favoriteId") }}'.replace(':favoriteId', favoriteId),
        method: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}',
          job_id: jobId,
          user_id: userId
        }
      }).then(function(response) {
        if (response.success) {
          favoriteId = null;
          updateButtonDisplay(false);
          showToast('Pekerjaan berhasil dihapus dari favorit!', 'success', 'Favorit Dihapus');
        }
      }).catch(function(error) {
        showToast('Gagal menghapus dari favorit!', 'error', 'Kesalahan');
        console.error('Error removing favorite:', error);
      });
    }

    $button.on('click', function() {
      checkFavoriteStatus().then(function(response) {
        if (response.exists) {
          removeFromFavorites();
        } else {
          addToFavorites();
        }
      });
    });

    function showToast(message, type, title) {
      $('#toastTitle').text(title || 'Favorit');
      $('#toastMessage').text(message);

      var toast = new bootstrap.Toast($('#liveToast')[0]);
      toast.show();
    }

    checkFavoriteStatus();

    document.getElementById('shareButton').addEventListener('click', function() {
      const urlToCopy = window.location.href;

      navigator.clipboard.writeText(urlToCopy)
        .then(() => {
          showToast('Link telah disalin ke clipboard!', 'success', 'Link Disalin');
        })
        .catch((error) => {
          console.error('Gagal menyalin: ', error);
          showToast('Gagal menyalin link', 'error', 'Kesalahan');
        });
    });
  });
</script>
<script>
  $(document).ready(function() {
    const $applyButton = $('#applyButton');
    const $applyModal = $('#applyModal');
    const $applyForm = $('#applyForm');
    const $cvInput = $('#cv');
    const jobId = $applyButton.data('job-id');

    // Check if already applied
    function checkApplicationStatus() {
      return $.ajax({
        url: '{{ route("apply.check") }}',
        method: 'GET',
        data: {
          job_id: jobId
        }
      }).then(function(response) {
        if (response.applied) {
          disableApplyButton();
        }
      });
    }

    // Disable apply button
    function disableApplyButton() {
      $applyButton
        .prop('disabled', true)
        .html('<i class="fa-solid fa-check me-2"></i>Dilamar')
        .removeClass('btn-primary')
        .addClass('btn-secondary');
    }

    // Clear CV input
    $('#clearCV').on('click', function() {
      $cvInput.val('');
    });

    // Show modal when apply button clicked
    $applyButton.on('click', function() {
      if (!$(this).prop('disabled')) {
        $applyModal.modal('show');
      }
    });

    // Handle form submission
    $('#submitApply').on('click', function() {
      const formData = new FormData($applyForm[0]);
      formData.append('job_id', jobId);

      // Show loading state
      $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Mengirim...');

      $.ajax({
        url: '{{ route("apply.store") }}',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            $applyModal.modal('hide');
            disableApplyButton();
            showToast('Lamaran berhasil dikirim!', 'success');
          }
        },
        error: function(xhr) {
          let message = 'Terjadi kesalahan saat mengirim lamaran!';
          if (xhr.responseJSON && xhr.responseJSON.message) {
            message = xhr.responseJSON.message;
          }
          showToast(message, 'error');
        },
        complete: function() {
          // Reset loading state
          $('#submitApply').prop('disabled', false).html('Kirim Lamaran');
        }
      });
    });

    // File input validation
    $cvInput.on('change', function() {
      const file = this.files[0];
      if (file) {
        const maxSize = 2 * 1024 * 1024; // 2MB
        if (file.size > maxSize) {
          showToast('Ukuran file terlalu besar. Maksimal 2MB', 'error');
          this.value = '';
        } else if (file.type !== 'application/pdf') {
          showToast('Format file harus PDF', 'error');
          this.value = '';
        }
      }
    });

    // Check initial application status
    checkApplicationStatus();
  });
</script>

</html>