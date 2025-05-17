<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Login - {{ config('app.name', 'Simarir') }}</title>
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<style>
  body {
    background-color: #f8f9fa;
    padding: 20px 0;
  }

  .login-container {
    max-width: 500px;
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

  .form-check-input:checked {
    background-color: #008081;
    border-color: #008081;
  }
</style>

<body>
  <div class="container">
    <div class="login-container mt-5">
      <div class="card">
        <div class="card-header text-center">
          <h4 class="mb-0"><i class="bi bi-shield-lock-fill me-2"></i>Login Admin</h4>
          <p class="mb-0 mt-2">Masuk untuk mengakses dashboard</p>
        </div>
        <div class="card-body p-4">
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan email" required autocomplete="email" autofocus>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan kata sandi" required autocomplete="current-password">
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="mb-4 form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <div class="d-grid gap-2 mb-3">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>