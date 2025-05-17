<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Register - {{ config('app.name', 'Simarir') }}</title>
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

    .register-container {
        max-width: 800px;
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

    .file-upload {
        position: relative;
        display: flex;
    }

    .file-upload .input-group-text {
        border-radius: 10px 0 0 10px;
    }

    .file-upload .form-control {
        border-radius: 0 10px 10px 0;
        padding: 12px;
        cursor: pointer;
        overflow: hidden;
    }
</style>

<body>
    <div class="container">
        <div class="register-container my-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Registrasi Admin</h4>
                    <p class="mb-0 mt-2">Buat akun untuk mekases fitur admin</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.register.post') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan nama lengkap" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                    <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan email" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Buat kata sandi kuat" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-check-lg"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi kata sandi" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">Alamat</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="3" placeholder="Masukan alamat lengkap">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 08123456789">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="avatar" class="form-label">Foto Profil</label>
                            <div class="file-upload">
                                <span class="input-group-text"><i class="bi bi-image-fill"></i></span>
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">
                                @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-text text-muted">Unggah foto profil (opsional)</div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-person-check-fill me-2"></i>Register
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