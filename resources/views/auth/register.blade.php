<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stepper Register</title>
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<style>
  body {
    background-color: #f8f9fa;
    padding: 20px 0;
  }

  .stepper-container {
    max-width: 700px;
    margin: auto;
  }

  .card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  }

  .card-header {
    background: linear-gradient(135deg, #008081 0%, #00b4b5 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    padding: 20px;
  }

  .step-indicator {
    display: flex;
    justify-content: space-between;
    margin: 20px 0 30px;
    position: relative;
  }

  .step-indicator::before {
    content: '';
    position: absolute;
    background: #e9ecef;
    height: 4px;
    width: 100%;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
  }

  .step-indicator .step-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: white;
    border: 4px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: bold;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
  }

  .step-indicator .step-label {
    position: absolute;
    top: 70px;
    text-align: center;
    width: 120px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 14px;
    font-weight: 500;
    color: #6c757d;
  }

  .step-indicator .active .step-icon {
    background: linear-gradient(135deg, #008081 0%, #00b4b5 100%);
    border-color: #00b4b5;
    color: white;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  }

  .step-indicator .active .step-label {
    color: #008081;
    font-weight: 600;
  }

  .step-indicator .completed .step-icon {
    background: #28a745;
    border-color: #28a745;
    color: white;
  }

  .step-indicator .completed .step-label {
    color: #28a745;
  }

  .form-control,
  .form-select {
    padding: 12px;
    border-radius: 10px;
  }

  .form-control:focus,
  .form-select:focus {
    box-shadow: 0 0 0 0.25rem rgba(0, 128, 129, 0.25);
    border-color: #008081;
  }

  .btn {
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s;
  }

  .btn-primary {
    background: linear-gradient(135deg, #008081 0%, #00b4b5 100%);
    border: none;
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, #006667 0%, #009899 100%);
    transform: translateY(-2px);
  }

  .btn-secondary {
    background-color: #6c757d;
    border: none;
  }

  .btn-success {
    background: linear-gradient(135deg, #008081 0%, #00c2c3 100%);
    border: none;
  }

  .btn-success:hover {
    background: linear-gradient(135deg, #006667 0%, #00a4a5 100%);
    transform: translateY(-2px);
  }

  .step {
    display: none;
    animation: fadeIn 0.5s;
  }

  .step.active {
    display: block;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .form-label {
    font-weight: 500;
    margin-bottom: 8px;
    color: #495057;
  }

  .card-footer {
    background: transparent;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    padding: 20px;
  }

  .input-group-text {
    border-radius: 10px 0 0 10px;
    background-color: #e9ecef;
  }

  .input-group .form-control {
    border-radius: 0 10px 10px 0;
  }

  .form-floating label {
    padding: 1rem 0.75rem;
  }

  .form-floating .form-control {
    height: calc(3.5rem + 2px);
    padding: 1rem 0.75rem;
  }

  #location-suggestions {
    width: 94%;
    max-width: 94%;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    margin-left: 35px;
    margin-top: 50px;
    z-index: 10;
  }
</style>

<body>
  <div class="container">
    <div class="stepper-container mt-4">
      <div class="card">
        <div class="card-header text-center">
          <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Register</h4>
          <p class="mb-0 mt-2">Buat akun untuk mengakses semua fitur</p>
        </div>
        <div class="card-body p-4">
          <!-- Step Indicator -->
          <div class="step-indicator">
            <div class="step-item active" data-step="1">
              <div class="step-icon">
                <i class="bi bi-person"></i>
              </div>
              <div class="step-label">Informasi Pribadi</div>
            </div>
            <div class="step-item" data-step="2">
              <div class="step-icon">
                <i class="bi bi-briefcase"></i>
              </div>
            </div>
          </div>

          <!-- Progress Bar -->
          <div class="progress mb-4" style="height: 10px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="progressBar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <!-- Stepper Form -->
          <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Step 1 -->
            <div class="step active" id="step-1">
              <div class="mb-4">
                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                  <input type="text" class="form-control" id="name" name="name" value="{{ session('name', '') }}" placeholder="Masukkan nama lengkap Anda" required>
                </div>
              </div>

              <input type="hidden" name="email" value="{{ old('email', session('email')) }}">
              <input type="hidden" name="google_id" value="{{ old('google_id', session('google_id')) }}">

              <div class="mb-4">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Contoh: 08123456789" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select" id="gender" name="gender" required>
                      <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                      <option value="male">Laki-laki</option>
                      <option value="female">Perempuan</option>
                      <option value="other">Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <label for="dateBirth" class="form-label">Tanggal Lahir</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                    <input type="date" class="form-control" id="dateBirth" name="date_birth" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="step" id="step-2">
              <div class="mb-4">
                <label for="location" class="form-label">Lokasi</label>
                <div class="input-group position-relative">
                  <span for="location" class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                  <input type="text" class="form-control" id="location" name="location" placeholder="Kota, Provinsi" required>
                  <div id="location-suggestions" class="list-group position-absolute w-100" style="max-height: 200px; overflow-y: auto; display: none;"></div>
                </div>
              </div>

              <div class="mb-4">
                <label for="education" class="form-label">Pendidikan Terakhir</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-mortarboard-fill"></i></span>
                  <select class="form-select" id="education" name="education" required>
                    <option value="" selected disabled>-- Pilih Pendidikan --</option>
                    @foreach ($educations as $education)
                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="mb-4">
                <label for="jobRole" class="form-label">Bidang Pekerjaan</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                  <select class="form-select" id="jobRole" name="job_role" required>
                    <option value="" selected disabled>-- Pilih Bidang Pekerjaan --</option>
                    @foreach ($jobRoles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="mb-4">
                <label for="moto" class="form-label">Moto Hidup</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-chat-quote-fill"></i></span>
                  <textarea class="form-control" id="moto" name="moto" rows="3" placeholder="Bagikan moto hidup yang menginspirasi Anda" required></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="card-footer text-end">
          <div class="row">
            <div class="col-6 text-start">
              <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;" onclick="prevStep()">
                <i class="bi bi-arrow-left me-1"></i> Sebelumnya
              </button>
            </div>
            <div class="col-6 text-end">
              <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextStep()">
                Selanjutnya <i class="bi bi-arrow-right ms-1"></i>
              </button>
              <button type="button" class="btn btn-success" id="submitBtn" style="display:none;" onclick="submitForm()">
                <i class="bi bi-check-circle me-1"></i> Daftar Sekarang
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-3 text-muted">
        <small>Sudah punya akun? <a href="#" class="text-decoration-none">Masuk di sini</a></small>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
    let currentStep = 1;
    const totalSteps = 2;
    updateStepIndicator();

    function nextStep() {
      if (validateStep(currentStep)) {
        if (currentStep < totalSteps) {
          // Hide current step
          document.getElementById('step-' + currentStep).classList.remove('active');
          // Increment step
          currentStep++;
          // Show next step
          document.getElementById('step-' + currentStep).classList.add('active');
          // Update buttons
          updateButtons();
          // Update step indicator
          updateStepIndicator();
          // Update progress bar
          updateProgressBar();

          // Scroll to top of form
          document.querySelector('.card-body').scrollTop = 0;
        }
      }
    }

    function prevStep() {
      if (currentStep > 1) {
        // Hide current step
        document.getElementById('step-' + currentStep).classList.remove('active');
        // Decrement step
        currentStep--;
        // Show previous step
        document.getElementById('step-' + currentStep).classList.add('active');
        // Update buttons
        updateButtons();
        // Update step indicator
        updateStepIndicator();
        // Update progress bar
        updateProgressBar();

        // Scroll to top of form
        document.querySelector('.card-body').scrollTop = 0;
      }
    }

    function updateButtons() {
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const submitBtn = document.getElementById('submitBtn');

      // Previous button visibility
      prevBtn.style.display = currentStep > 1 ? 'block' : 'none';

      // Next/Submit button visibility
      if (currentStep < totalSteps) {
        nextBtn.style.display = 'block';
        submitBtn.style.display = 'none';
      } else {
        nextBtn.style.display = 'none';
        submitBtn.style.display = 'block';
      }
    }

    function updateStepIndicator() {
      const stepItems = document.querySelectorAll('.step-item');

      stepItems.forEach((item, index) => {
        const stepNumber = index + 1;

        // Reset all classes
        item.classList.remove('active', 'completed');

        // Mark current step as active
        if (stepNumber === currentStep) {
          item.classList.add('active');
        }
        // Mark completed steps
        else if (stepNumber < currentStep) {
          item.classList.add('completed');
        }
      });
    }

    function updateProgressBar() {
      const progressBar = document.getElementById('progressBar');
      const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
      progressBar.style.width = progressPercentage + '%';
    }

    function validateStep(step) {
      // Get all input fields in the current step
      const currentStepElement = document.getElementById('step-' + step);
      const inputFields = currentStepElement.querySelectorAll('input, select, textarea');

      let isValid = true;

      // Check each field
      inputFields.forEach(field => {
        if (field.hasAttribute('required') && !field.value.trim()) {
          isValid = false;
          field.classList.add('is-invalid');

          // Add event listener to remove is-invalid when field gets a value
          field.addEventListener('input', function() {
            if (this.value.trim()) {
              this.classList.remove('is-invalid');
            }
          });
        } else {
          field.classList.remove('is-invalid');
        }
      });

      // Show validation message if needed
      if (!isValid) {
        // You can add a custom validation message here
        const invalidFields = currentStepElement.querySelectorAll('.is-invalid');
        if (invalidFields.length > 0) {
          invalidFields[0].focus();
        }
      }

      return isValid;
    }

    function submitForm() {
      if (validateStep(currentStep)) {
        // Submit the form
        document.getElementById('registerForm').submit();
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      const locationInput = document.getElementById("location");
      const suggestionsBox = document.getElementById("location-suggestions");

      let cities = [];

      async function fetchCities() {
        const provinceIds = [
          11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 31, 32, 33, 34, 35, 36, 51, 52, 53, 61, 62, 63, 64, 65, 71, 72, 73, 74, 75, 76, 81, 82, 91, 92
        ];

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
</body>

</html>