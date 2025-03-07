<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loker</title>
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
            <a class="navbar-brand" href="#" class="action"><i class="ph-duotone ph-book"></i></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary fw-bold" href="/user-job-work">Pekerjaan</a>
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
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container my-2">
            <div class="alert bg-white border border-1 border-primary alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                Hallo <span class="text-primary fw-bold">{{auth()->user()->name}} 👋</span>. Yuk cari pekerjaan yang sesuai dengan keinginan kamu.
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="card border-1 border-primary p-3">
                        <button class="btn btn-dark w-100 d-md-none mb-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarContent" aria-expanded="false" aria-controls="sidebarContent">
                            Filter
                        </button>
                        <div class="collapse d-md-block sticky-sidebar" id="sidebarContent">
                            <form action="{{ route('user-job-work.index') }}" method="GET" id="filterForm">
                                <!-- Search hidden field to sync with main search -->
                                @if(request()->has('search'))
                                <input type="hidden" name="search" id="sidebar-search-input" value="{{ request('search') }}">
                                @endif

                                <!-- Tipe Pekerjaan Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">Tipe Pekerjaan</h6>
                                    @foreach($workTypes as $workType)
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox"
                                            name="work_types[]" value="{{ $workType->id }}" id="workType{{ $workType->id }}"
                                            {{ in_array($workType->id, request('work_types', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="workType{{ $workType->id }}">
                                            {{ $workType->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Metode Pekerjaan Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">Metode Pekerjaan</h6>
                                    @foreach($workMethods as $workMethod)
                                    <div class="form-check">
                                        <input class="form-check-input custom-checkbox" type="checkbox"
                                            name="work_methods[]" value="{{ $workMethod->id }}" id="workMethod{{ $workMethod->id }}"
                                            {{ in_array($workMethod->id, request('work_methods', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="workMethod{{ $workMethod->id }}">
                                            {{ $workMethod->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Lokasi Dropdown -->
                                <div class="mb-4 position-relative">
                                    <h6 class="fw-bold">Lokasi</h6>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Cari lokasi...">
                                    <div id="location-suggestions" class="list-group position-absolute w-100" style="z-index: 1000; display: none;"></div>
                                </div>


                                <!-- Button -->
                                <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="container mb-4">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <form action="{{ route('user-job-work.index') }}" method="GET" id="searchForm">
                                    <!-- Keep all current filter parameters when searching -->
                                    @if(request()->has('work_types'))
                                    @foreach(request('work_types') as $type)
                                    <input type="hidden" name="work_types[]" value="{{ $type }}">
                                    @endforeach
                                    @endif
                                    @if(request()->has('work_methods'))
                                    @foreach(request('work_methods') as $method)
                                    <input type="hidden" name="work_methods[]" value="{{ $method }}">
                                    @endforeach
                                    @endif
                                    @if(request()->has('location'))
                                    <input type="hidden" name="location" value="{{ request('location') }}" id="search-location-input">
                                    @endif

                                    <div class="search-container justify-content-center d-flex">
                                        <input type="text" class="form-control search-input" name="search"
                                            placeholder="Search..." value="{{ request('search') }}" id="main-search-input">
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="ph-duotone ph-magnifying-glass search-icon me-3"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Produk -->
                    <div class="row g-3">
                        <!-- Card 1 -->
                        @if (count($jobWorks) > 0)
                        @foreach ($jobWorks as $jobWork)
                        <div class="col-md-6 mb-3 d-flex">
                            <div class="card border-1 border-primary w-100">
                                <a class="card-body d-flex flex-column text-decoration-none text-dark" href="{{ route('user-job-work.show', $jobWork->id) }}">

                                    <!-- Nama Pekerjaan & Gaji -->
                                    <div class="d-flex justify-content-between align-items-center mb-2 px-3 mt-3">
                                        <h5 class="card-title text-truncate mb-0 fw-semibold col-md-10">{{ $jobWork->name }}</h5>
                                        <p class="text-primary fw-semibold mb-0 col-md-2 text-end">
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

                                    <!-- Badge Kualifikasi -->
                                    <div class="d-flex flex-wrap gap-1 mb-3 px-3">
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

                                    <!-- Perusahaan -->
                                    <div class="d-flex align-items-center mt-auto px-3">
                                        @if ($jobWork->company->user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $jobWork->company->user->avatar) }}" alt="Company Logo" class="rounded me-2 border border-1" style="width: 45px; height: 45px; object-fit: cover;">
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
                                            <small class="text-muted">{{ $jobWork->location }}</small>
                                        </div>
                                    </div>

                                    <hr class="my-3 mx-3 border-primary">

                                    <!-- Kandidat Pelamar & Tombol Bookmark -->
                                    <div class="d-flex justify-content-between align-items-center px-3 mb-3">
                                        <small class="text-muted">{{ count($jobWork->candidates) }} Pelamar</small>
                                        <a class="bookmarkButton p-0 m-0" style="cursor: pointer;" id="bookmarkButton-{{ $jobWork->id }}" data-job-id="{{ $jobWork->id }}" data-favorite-id="{{ $jobWork->favorite_id }}">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </a>
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

    document.addEventListener('DOMContentLoaded', function() {
        const mainSearchInput = document.getElementById('main-search-input');
        const sidebarSearchInput = document.getElementById('sidebar-search-input');

        if (mainSearchInput && sidebarSearchInput) {
            mainSearchInput.addEventListener('input', function() {
                sidebarSearchInput.value = this.value;
            });
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        const locationInput = document.getElementById("location");
        const suggestionsBox = document.getElementById("location-suggestions");
        const searchLocationInput = document.getElementById("search-location-input");
        let cities = [];

        const provinceIds = [
            11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 31, 32, 33, 34, 35, 36, 51, 52, 53, 61, 62, 63, 64, 65,
            71, 72, 73, 74, 75, 76, 81, 82, 91, 92
        ];

        async function fetchCities() {
            for (let provinceId of provinceIds) {
                try {
                    let response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`);
                    let data = await response.json();
                    cities = [...cities, ...data];
                } catch (error) {
                    console.error(`Error fetching cities for province ${provinceId}:`, error);
                }
            }
        }

        function showSuggestions(query) {
            const filteredCities = cities.filter(city => city.name.toLowerCase().includes(query.toLowerCase()));

            suggestionsBox.innerHTML = "";
            if (filteredCities.length > 0) {
                suggestionsBox.style.display = "block";

                filteredCities.forEach(city => {
                    let suggestionItem = document.createElement("div");
                    suggestionItem.classList.add("list-group-item", "list-group-item-action");
                    suggestionItem.textContent = city.name;
                    suggestionItem.onclick = function() {
                        locationInput.value = city.name;
                        if (searchLocationInput) {
                            searchLocationInput.value = city.name;
                        }
                        suggestionsBox.style.display = "none";
                    };
                    suggestionsBox.appendChild(suggestionItem);
                });
            } else {
                suggestionsBox.style.display = "none";
            }
        }

        locationInput.addEventListener("input", function() {
            let query = this.value.trim();
            if (query.length > 2) {
                showSuggestions(query);
            } else {
                suggestionsBox.style.display = "none";
            }
        });

        document.addEventListener("click", function(e) {
            if (!suggestionsBox.contains(e.target) && e.target !== locationInput) {
                suggestionsBox.style.display = "none";
            }
        });

        fetchCities();
    });
</script>

</html>