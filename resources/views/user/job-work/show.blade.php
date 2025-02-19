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
      <div class="card p-3 shadow-sm border-0 shadow-sm border-0">
        <div class="row align-items-center">
          <!-- Image Section -->
          <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px; border: 1px solid #ddd;">
              <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Image" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover;" class="img-fluid rounded-2 shadow-sm">
            </div>
          </div>
          <!-- Text and Details Section -->
          <div class="col-md-8">
            <h3 class="fw-bold">{{ $jobWork->name }}</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-building" style="width: 24px;"></i>
                  <p class="card-text fw-semibold">{{ $jobWork->company->user->name }}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-building" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->corporateField->name}} - {{ $jobWork->jobRole->name}}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-money-bill" style="width: 24px;"></i>
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
                  <i class="fa-solid fa-clock" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->workType->name }}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-briefcase" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->workMethod->name }}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-check" style="width: 24px;"></i>
                  @if ($jobWork->company->status_verification == 0)
                  <span class="badge bg-warning p-2">Belum Terverifikasi</span>
                  @elseif ($jobWork->company->status_verification == 1)
                  <span class="badge bg-success p-2">Terverifikasi</span>
                  @endif
                </div>
              </div>
            </div>
            <!-- Buttons -->
            <div class="mt-3">
              <button class="btn btn-primary fw-semibold">Lamar</button>
              <button class="btn btn-outline-primary fw-semibold" id="shareButton">
                <i class="fa-solid fa-share-from-square me-2"></i>Bagikan
              </button>
              <button id="bookmarkButton" class="btn btn-outline-primary fw-semibold" data-job-id="{{ $jobWork->id }}">
                <i class="fa-regular fa-bookmark me-2"></i>Favorit
              </button>
            </div>
          </div>
        </div>
        <hr>
        <!-- Skills Section -->
        <div class="d-flex flex-wrap gap-2 justify-content-center text-center">
          @foreach($jobWork->skillJobs as $skill)
          <span class="badge bg-secondary text-light p-2">{{ $skill->skill->name }}</span>
          @endforeach
        </div>
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
                    <span class="ms-auto">: {{ $jobWork->qualification->work_experience}} Tahun</span>
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
                    <span class="ms-auto">: {{ $jobWork->qualification->education->name}}</span>
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
                    <span class="ms-auto">: {{ $jobWork->qualification->major}}</span>
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
                    <span class="ms-auto">: {{ $jobWork->qualification->ipk}}</span>
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
                    <span class="ms-auto">: {{ $jobWork->qualification->toefl}}</span>
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
              <div class="text">
                {!! $jobWork->description !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="card p-3 shadow-sm border-0">
        <div class="row align-items-center">
          <!-- Image Section -->
          <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px; border: 1px solid #ddd;">
              <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Image" style="max-width: 500px; max-height: 200px; width:100%; height:100%; object-fit: cover;" class="img-fluid rounded-2 shadow-sm">
            </div>
          </div>
          <!-- Text and Details Section -->
          <div class="col-md-8">
            <h3 class="fw-bold">{{ $jobWork->company->user->name }}</h3>
            <p>{{ $jobWork->company->user->moto }}</p>
            <div class="row">
              <div class="col-md-6">
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-location-dot" style="width: 24px;"></i>
                  <p class="card-text fw-semibold">{{ $jobWork->company->user->location }}</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-building" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->corporateField->name }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-users" style="width: 24px;"></i>
                  <p class="card-text">{{ $jobWork->company->employee }} Karyawan</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                  <i class="fa-solid fa-check" style="width: 24px;"></i>
                  @if ($jobWork->company->status_verification == 0)
                  <span class="badge bg-warning p-2">Belum Terverifikasi</span>
                  @elseif ($jobWork->company->status_verification == 1)
                  <span class="badge bg-success p-2">Terverifikasi</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="card p-3 shadow-sm border-0">
        <h5 class="fw-bold">Rekomendasi Pekerjaan</h5>
        <div class="row g-4">
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

</html>