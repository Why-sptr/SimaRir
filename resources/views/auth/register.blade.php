<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stepper Register</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .stepper-container {
      max-width: 600px;
      margin: auto;
    }
  </style>
</head>

<body>

  <div class="stepper-container mt-5">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Register Stepper</h5>
      </div>
      <div class="card-body">
        <!-- Stepper Form -->
        <form id="registerForm" action="{{ route('register') }}" method="POST">
          @csrf
          <!-- Step 1 -->
          <div class="step" id="step-1">
            <h6>Step 1: Informasi Pribadi</h6>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ session('name', '') }}" required>
            </div>
            <input type="hidden" name="email" value="{{ old('email', session('email')) }}">
            <input type="hidden" name="google_id" value="{{ old('google_id', session('google_id')) }}">
            <div class="mb-3">
              <label for="phone" class="form-label">Telepon</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Jenis Kelamin</label>
              <select class="form-control" id="gender" name="gender" required>
                <option value="">-- Pilih --</option>
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
                <option value="other">Lainnya</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="dateBirth" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="dateBirth" name="date_birth" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
          </div>
          <!-- Step 2 -->
          <div class="step" id="step-2" style="display:none;">
            <h6>Step 2: Informasi Tambahan</h6>
            <div class="mb-3">
              <label for="location" class="form-label">Lokasi</label>
              <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="mb-3">
              <label for="education" class="form-label">Pendidikan</label>
              <select class="form-control" id="education" name="education" required>
                <option value="">-- Pilih --</option>
                @foreach ($educations as $education)
                <option value="{{ $education->id }}">{{ $education->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="jobRole" class="form-label">Bidang Pekerjaan</label>
              <select class="form-control" id="jobRole" name="job_role" required>
                <option value="">-- Pilih --</option>
                @foreach ($jobRoles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="moto" class="form-label">Moto</label>
              <textarea class="form-control" id="moto" name="moto" rows="3" required></textarea>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    function nextStep(step) {
      document.getElementById('step-' + (step - 1)).style.display = 'none';
      document.getElementById('step-' + step).style.display = 'block';
    }

    function prevStep(step) {
      document.getElementById('step-' + (step + 1)).style.display = 'none';
      document.getElementById('step-' + step).style.display = 'block';
    }
  </script>

</body>

</html>