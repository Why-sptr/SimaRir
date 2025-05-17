<!-- resources/views/admin/admin-user/edit.blade.php -->
@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if($admin->avatar)
                    <img src="{{ asset('storage/admin-avatars/' . $admin->avatar) }}" alt="Profile" class="rounded-circle object-fit-cover border border-1 border-primary" width="120" height="120">
                    @else
                    <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 120px; height: 120px; font-size: 48px;">
                        {{ substr($admin->name, 0, 1) }}
                    </div>
                    @endif
                    <h2 class="mt-3">{{ $admin->name }}</h2>
                    <h3>Admin</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content pt-3">
                        <!-- Edit Profile Tab -->
                        <div class="tab-pane fade show active profile-edit" id="profile-edit">
                            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="d-flex align-items-center">
                                            @if($admin->avatar)
                                            <img src="{{ asset('storage/admin-avatars/' . $admin->avatar) }}" alt="Profile" class="rounded-circle me-3 border border-1 border-primary" width="80" height="80">
                                            @else
                                            <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 80px; height: 80px; font-size: 32px;">
                                                {{ substr($admin->name, 0, 1) }}
                                            </div>
                                            @endif
                                            <div>
                                                <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                                @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="small text-muted mt-1">
                                                    Allowed JPG, JPEG, PNG, GIF. Max size 2MB
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $admin->name) }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $admin->email) }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $admin->phone) }}">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="male" {{ old('gender', $admin->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="female" {{ old('gender', $admin->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                            <option value="other" {{ old('gender', $admin->gender) == 'other' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3">{{ old('address', $admin->address) }}</textarea>
                                        @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade profile-change-password" id="profile-change-password">
                            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Hidden inputs for name and email --}}
                                <input type="hidden" name="name" value="{{ $admin->name }}">
                                <input type="hidden" name="email" value="{{ $admin->email }}">

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="new-password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection