<!-- resources/views/admin/user/show.blade.php -->
@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/user') }}">User Management</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if($user->avatar)
                    @if(Str::startsWith($user->avatar, 'http'))
                    <img src="{{ $user->avatar }}" alt="Profile" class="rounded-circle" width="120" height="120">
                    @else
                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Profile" class="rounded-circle object-fit-cover border border-1 border-primary" width="120" height="120">
                    @endif
                    @else
                    <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 120px; height: 120px; font-size: 48px;">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    @endif
                    <h2 class="mt-3">{{ $user->name }}</h2>
                    <h3>{{ $user->jobRole->name ?? 'No Job Role' }}</h3>
                    <div class="social-links mt-2">
                        @if($user->socialMedia)
                        @if($user->socialMedia->linkedin)
                        <a href="{{ $user->socialMedia->linkedin }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        @endif
                        @if($user->socialMedia->github)
                        <a href="{{ $user->socialMedia->github }}" target="_blank" class="github"><i class="bi bi-github"></i></a>
                        @endif
                        @if($user->socialMedia->twitter)
                        <a href="{{ $user->socialMedia->twitter }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        @endif
                        @if($user->socialMedia->facebook)
                        <a href="{{ $user->socialMedia->facebook }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if($user->socialMedia->instagram)
                        <a href="{{ $user->socialMedia->instagram }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail</h5>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Nama</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Email</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Telepon</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->phone ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Lokasi</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->location ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Pendidikan</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->education->name ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Jenis Kelamin</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->gender ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">Tanggal Lahir</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->date_birth ? date('d F Y', strtotime($user->date_birth)) : '-' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 label">Pengalaman</div>
                        <div class="col-lg-8 col-md-8">: {{ $user->work_experience ?? '-' }} years</div>
                    </div>
                </div>
            </div>

            @if($user->attachment)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lampiran</h5>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-4 label">CV</div>
                        <div class="col-lg-8 col-md-8">
                            @if($user->attachment->cv)
                            <a href="{{ asset('storage/attachments/' . $user->attachment->cv) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat CV
                            </a>
                            @else
                            -
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 label">Portfolio</div>
                        <div class="col-lg-8 col-md-8">
                            @if($user->attachment->portfolio)
                            <a href="{{ $user->attachment->portfolio }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-link-45deg"></i> View Portfolio
                            </a>
                            @else
                            -
                            @endif
                        </div>
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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-experience">Pengalaman Kerja</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-certification">Sertifikasi</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-skills">Skill</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content pt-3">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if($user->moto)
                            <h5 class="card-title">Motto</h5>
                            <p class="fst-italic">{{ $user->moto }}</p>
                            @endif

                            @if($user->description)
                            <h5 class="card-title">Tentang</h5>
                            <div class="text">
                                {!! $user->description !!}
                            </div>
                            @endif

                            @if($user->organizations && $user->organizations->count() > 0)
                            <h5 class="card-title">Organisasi</h5>
                            <div class="row">
                                @foreach($user->organizations as $organization)
                                <div class="col-12 mb-3">
                                    <div class="card p-3">
                                        <h5 class="fw-semibold">{{ $organization->name }}</h5>
                                        <h6 class="fw-semibold test-muted">{{ $organization->department }}</h6>
                                        <div class="text">
                                            {!! $organization->description !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <!-- Work Experience Tab -->
                        <div class="tab-pane fade profile-experience" id="profile-experience">
                            @if($user->recentWorkExperiences && $user->recentWorkExperiences->count() > 0)
                            @foreach($user->recentWorkExperiences as $experience)
                            <div class="card mb-3 p-3">
                                <div class="d-flex align-items-center">
                                    @if($experience->company && $experience->company->logo)
                                    <img src="{{ asset('storage/company_logos/' . $experience->company->logo) }}" alt="Company Logo" class="me-3" width="50">
                                    @endif
                                    <div>
                                        <h5 class="fw-semibold">{{ $experience->name }}</h5>
                                        <h6>{{ $experience->jobdesk }}</h6>
                                    </div>
                                </div>
                                <div class="text-muted small">
                                    {{ date('M Y', strtotime($experience->start_date)) }} -
                                    {{ $experience->end_date ? date('M Y', strtotime($experience->end_date)) : 'Present' }}
                                </div>
                                <div class="text">
                                    {!! $experience->description !!}
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="text-center py-4">
                                <p>No work experience information available</p>
                            </div>
                            @endif
                        </div>

                        <!-- Certifications Tab -->
                        <div class="tab-pane fade profile-certification" id="profile-certification">
                            @if($user->certifications && $user->certifications->count() > 0)
                            <div class="row">
                                @foreach($user->certifications as $certification)
                                <div class="col-md-12 mb-3">
                                    <div class="card h-100 p-3">
                                        <h5 class="fw-semibold">{{ $certification->name }}</h5>
                                        <h6 class="text-muted fw-semibold">{{ $certification->publisher }}</h6>
                                        <div class="text-muted small">
                                            {{ date('M Y', strtotime($certification->start_date)) }} -
                                            {{ $certification->end_date ? date('M Y', strtotime($certification->end_date)) : 'Present' }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-4">
                                <p>No certification information available</p>
                            </div>
                            @endif
                        </div>

                        <!-- Skills Tab -->
                        <div class="tab-pane fade profile-skills" id="profile-skills">
                            @if($user->skills && $user->skills->count() > 0)
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                @foreach($user->skills as $skill)
                                <span class="badge bg-primary">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-4">
                                <p>No skills information available</p>
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
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus User
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection