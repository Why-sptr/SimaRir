<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ isset($jobWork) ? 'Edit Lowongan' : 'Pasang Lowongan' }}</title>
    <link rel="stylesheet" href="/css/style.css">
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
</head>

<body>
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
                            <a class="nav-link fw-semibold" href="/company">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="/company-job-work/create">Upload Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work">List Pekerjaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container p-3">
            @if(isset($jobWork))
            <form action="{{ route('company-job-work.update', $jobWork->id) }}" method="POST">
                @method('PUT')
                @else
                <form action="{{ route('company-job-work.store') }}" method="POST">
                    @endif
                    @csrf
                    <div class="row border border-1 rounded-2 border-primary p-3 bg-white">
                        <h5 class="fw-bold my-3">Informasi</h5>
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Nama Pekerjaan</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($jobWork) ? $jobWork->name : old('name') }}" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="salary" class="form-label">Gaji</label>
                            <input type="number" class="form-control" id="salary" name="salary" value="{{ isset($jobWork) ? $jobWork->salary : old('salary') }}" required>
                        </div>
                        <div class="mb-3 col-md-4 position-relative">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ isset($jobWork) ? $jobWork->location : old('location') }}" required autocomplete="off">
                            <div id="location-suggestions" class="list-group position-absolute w-100" style="z-index: 1000; display: none;"></div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="work_experience">Pengalaman Kerja (tahun):</label>
                            <input type="number" id="work_experience" name="qualification[work_experience]" class="form-control" value="{{ isset($jobWork) ? $jobWork->qualification->work_experience : old('qualification.work_experience') }}" required>
                        </div>
                        <div class="mb-5 col-md-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <div id="quill-editor"></div>
                            <input type="hidden" id="description-input" name="description" value="{{ isset($jobWork) ? $jobWork->description : old('description') }}">
                        </div>
                        <h5 class="fw-bold mm-3 mt-5">Tanggal</h5>
                        <div class="mb-3 col-md-6">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ isset($jobWork) ? $jobWork->start_date : old('start_date') }}" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="end_date" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ isset($jobWork) ? $jobWork->end_date : old('end_date') }}">
                        </div>
                        <h5 class="fw-bold my-3">Pekerjaan</h5>
                        <div class="mb-3 col-md-6">
                            <label for="work_type_id" class="form-label">Tipe Pekerjaan</label>
                            <select class="form-select" id="work_type_id" name="work_type_id" required>
                                @foreach($workTypes as $workType)
                                <option value="{{ $workType->id }}" {{ isset($jobWork) && $jobWork->work_type_id == $workType->id ? 'selected' : '' }}>{{ $workType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="work_method_id" class="form-label">Metode Pekerjaan</label>
                            <select class="form-select" id="work_method_id" name="work_method_id" required>
                                @foreach($workMethods as $workMethod)
                                <option value="{{ $workMethod->id }}" {{ isset($jobWork) && $jobWork->work_method_id == $workMethod->id ? 'selected' : '' }}>{{ $workMethod->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="job_role_id" class="form-label">Peran Pekerjaan</label>
                            <select class="form-select" id="job_role_id" name="job_role_id" required>
                                @foreach($jobRoles as $jobRole)
                                <option value="{{ $jobRole->id }}" {{ isset($jobWork) && $jobWork->job_role_id == $jobRole->id ? 'selected' : '' }}>{{ $jobRole->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="skill_job_id" class="form-label">Keahlian</label>
                            <select class="form-select select2" id="skill_job_id" name="skill_job_id[]" multiple="multiple" required>
                                @foreach($skills as $skill)
                                <option value="{{ $skill->id }}" {{ isset($jobWork) && $jobWork->skillJobs->contains('skill_id', $skill->id) ? 'selected' : '' }}>{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h5 class="fw-bold my-3">Pendidikan</h5>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="education_id">Pendidikan:</label>
                            <select id="education_id" name="qualification[education_id]" class="form-control" required>
                                @foreach($educations as $education)
                                <option value="{{ $education->id }}" {{ isset($jobWork) && $jobWork->qualification->education_id == $education->id ? 'selected' : '' }}>{{ $education->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="major">Jurusan:</label>
                            <input type="text" id="major" name="qualification[major]" class="form-control" value="{{ isset($jobWork) ? $jobWork->qualification->major : old('qualification.major') }}" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="ipk">IPK:</label>
                            <input type="number" step="0.01" id="ipk" name="qualification[ipk]" class="form-control" value="{{ isset($jobWork) ? $jobWork->qualification->ipk : old('qualification.ipk') }}" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="toefl">TOEFL:</label>
                            <input type="number" id="toefl" name="qualification[toefl]" class="form-control" value="{{ isset($jobWork) ? $jobWork->qualification->toefl : old('qualification.toefl') }}" required>
                        </div>

                        <div class="my-4 d-flex flex-row gap-3">
                            <button type="submit" class="btn btn-primary col">
                                {{ isset($jobWork) ? 'Update Lowongan' : 'Posting Lowongan' }}
                            </button>
                            @if (request()->routeIs('company-job-work.edit'))
                            <button type="button" class="btn btn-danger col-6" data-bs-toggle="modal" data-bs-target="#deleteJobModal">
                                Hapus Lowongan
                            </button>
                            @endif
                        </div>
                    </div>
                </form>
        </div>
    </section>
    @if (request()->routeIs('company-job-work.edit'))
    <div class="modal fade" id="deleteJobModal" tabindex="-1" aria-labelledby="deleteJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteJobModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus lowongan ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('company-job-work.destroy', $jobWork->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Keahlian",
            allowClear: false,
            theme: "bootstrap-5"
        });

        // Initialize Quill editor
        var quill = new Quill("#quill-editor", {
            theme: "snow"
        });

        // Set initial content in edit mode
        var initialDescription = document.getElementById("description-input").value;
        if (initialDescription) {
            quill.root.innerHTML = initialDescription;
        }

        quill.on("text-change", function() {
            document.getElementById("description-input").value = quill.root.innerHTML;
        });

        document.querySelector("form").addEventListener("submit", function() {
            document.getElementById("description-input").value = quill.root.innerHTML;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const locationInput = document.getElementById("location");
        const suggestionsBox = document.getElementById("location-suggestions");
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