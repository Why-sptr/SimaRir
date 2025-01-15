<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pasang Lowongan</title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    
</head>

<body>
    <section>
        <div class="container mt-5">
            <h2>Tambah Lowongan Pekerjaan</h2>
            <form action="{{ route('company-job-work.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pekerjaan</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Gaji</label>
                    <input type="number" class="form-control" id="salary" name="salary" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="mb-3">
                    <label for="work_type_id" class="form-label">Tipe Pekerjaan</label>
                    <select class="form-select" id="work_type_id" name="work_type_id" required>
                        @foreach($workTypes as $workType)
                        <option value="{{ $workType->id }}">{{ $workType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="work_method_id" class="form-label">Metode Pekerjaan</label>
                    <select class="form-select" id="work_method_id" name="work_method_id" required>
                        @foreach($workMethods as $workMethod)
                        <option value="{{ $workMethod->id }}">{{ $workMethod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job_role_id" class="form-label">Peran Pekerjaan</label>
                    <select class="form-select" id="job_role_id" name="job_role_id" required>
                        @foreach($jobRoles as $jobRole)
                        <option value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="skill_job_id" class="form-label">Keahlian</label>
                    <select class="form-select select2" id="skill_job_id" name="skill_job_id[]" multiple="multiple" required>
                        @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="work_experience">Pengalaman Kerja (tahun):</label>
                    <input type="number" id="work_experience" name="qualification[work_experience]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="education_id">Pendidikan:</label>
                    <select id="education_id" name="qualification[education_id]" class="form-control" required>
                        @foreach($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="major">Jurusan:</label>
                    <input type="text" id="major" name="qualification[major]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ipk">IPK:</label>
                    <input type="number" step="0.01" id="ipk" name="qualification[ipk]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="toefl">TOEFL:</label>
                    <input type="number" id="toefl" name="qualification[toefl]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Keahlian",
            allowClear: false,
            theme: "bootstrap-5"
        });
    });
</script>

</html>