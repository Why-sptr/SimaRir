<!-- resources/views/admin/company/show.blade.php -->
@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/company') }}">Perusahaan</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if($company->user->avatar)
                    @if(Str::startsWith($company->user->avatar, 'http'))
                    <img src="{{ $company->user->avatar }}" alt="Profile" class="rounded-circle" width="120" height="120">
                    @else
                    <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Profile" class="rounded-circle object-fit-cover border border-1 border-primary" width="120" height="120">
                    @endif
                    @else
                    <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 120px; height: 120px; font-size: 48px;">
                        {{ substr($company->user->name, 0, 1) }}
                    </div>
                    @endif
                    <h2 class="mt-3">{{ $company->user->name }}</h2>
                    <h3>{{ $company->corporateField->name ?? 'Tidak Ada Bidang Usaha' }}</h3>
                    <div class="social-links mt-2">
                        @if($company->user->socialMedia)
                        @if($company->user->socialMedia->linkedin)
                        <a href="{{ $company->user->socialMedia->linkedin }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        @endif
                        @if($company->user->socialMedia->instagram)
                        <a href="{{ $company->user->socialMedia->instagram }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if($company->user->socialMedia->tiktok)
                        <a href="{{ $company->user->socialMedia->tiktok }}" target="_blank" class="tiktok"><i class="bi bi-tiktok"></i></a>
                        @endif
                        @if($company->user->socialMedia->github)
                        <a href="{{ $company->user->socialMedia->github }}" target="_blank" class="github"><i class="bi bi-github"></i></a>
                        @endif
                        @if($company->user->socialMedia->website)
                        <a href="{{ $company->user->socialMedia->website }}" target="_blank" class="website"><i class="bi bi-globe"></i></a>
                        @endif
                        @if($company->user->socialMedia->youtube)
                        <a href="{{ $company->user->socialMedia->youtube }}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                        @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Perusahaan</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Nama</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->user->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Email</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->user->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Telepon</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->user->phone ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Lokasi</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->user->location ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Bidang Usaha</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->corporateField->name ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Jumlah Karyawan</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->employee ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Status Verifikasi</div>
                        <div class="col-lg-7 col-md-7">:
                            @if($company->status_verification == '1')
                            <span class="badge bg-success">Terverifikasi</span>
                            @else($company->status_verification == '0')
                            <span class="badge bg-danger">Belum Terverifikasi</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($company->verification_file)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dokumen Verifikasi</h5>
                    <div class="text-center">
                        <a href="{{ asset('storage/verification/' . $company->verification_file) }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="bi bi-file-earmark-pdf"></i> Lihat Dokumen
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if($company->workTimes)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jam Kerja</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Senin</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->monday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Selasa</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->tuesday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Rabu</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->wednesday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Kamis</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->thursday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Jumat</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->friday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Sabtu</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->saturday ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 col-md-5 label">Minggu</div>
                        <div class="col-lg-7 col-md-7">: {{ $company->workTimes->sunday ?? '-' }}</div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#company-overview">Ringkasan</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#company-gallery">Galeri</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#company-jobs">Lowongan Kerja</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content pt-3">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active profile-overview" id="company-overview">
                            @if($company->user->moto)
                            <h5 class="card-title">Motto</h5>
                            <p class="fst-italic">{{ $company->user->moto }}</p>
                            @endif

                            @if($company->user->description)
                            <h5 class="card-title">Tentang Perusahaan</h5>
                            <div class="text">
                                {!! $company->user->description !!}
                            </div>
                            @endif
                        </div>

                        <!-- Gallery Tab -->
                        <div class="tab-pane fade company-gallery" id="company-gallery">
                            @if($company->gallery) {{-- Hanya satu record --}}
                            @php
                            $images = [
                            $company->gallery->image1,
                            $company->gallery->image2,
                            $company->gallery->image3,
                            $company->gallery->image4,
                            $company->gallery->image5,
                            $company->gallery->image6,
                            ];
                            @endphp

                            <div class="row">
                                @foreach($images as $image)
                                @if($image)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/gallery_images/' . $image) }}" class="card-img-top" alt="Gallery Image">
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-4">
                                <p>Tidak ada galeri yang tersedia</p>
                            </div>
                            @endif
                        </div>

                        <!-- Job Works Tab -->
                        <div class="tab-pane fade company-jobs" id="company-jobs">
                            @if($company->jobWorks && $company->jobWorks->count() > 0)
                            <div class="row">
                                @foreach($company->jobWorks as $job)
                                <div class="col-md-12 mb-2">
                                    <div class="card p-3">
                                        <h5 class="fw-semibold mb-1">{{ $job->name }}</h5>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-primary">{{ $job->workType->name ?? 'Tipe Tidak Diketahui' }}</span>
                                            <small class="text-muted">{{ date('d M Y', strtotime($job->created_at)) }}</small>
                                        </div>
                                        <div class="mb-1">
                                            <strong>Lokasi:</strong> {{ $job->location ?? '-' }}
                                        </div>
                                        <div class="mb-1">
                                            <strong>Gaji:</strong> {{ $job->salary ?? '-' }}
                                        </div>
                                        <div class="mb-1">
                                            <strong>Deskripsi:</strong>
                                            <div>{!! Str::limit(strip_tags($job->description), 150, '...') !!}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-4">
                                <p>Tidak ada lowongan kerja yang tersedia</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.company.index') }}" class="btn btn-secondary">Kembali</a>
                @if($company->status_verification == 'pending')
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Verifikasi
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('company.verify', $company->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="dropdown-item">Setujui</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('company.verify', $company->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="dropdown-item">Tolak</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                <form action="{{ route('company.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus Perusahaan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection