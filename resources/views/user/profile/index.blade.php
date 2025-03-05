<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
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
                            <a class="nav-link active text-primary fw-bold" href="/user-profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/user-job-work">Pekerjaan</a>
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
        <div class="container mt-4">
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-3">
                    <div class="card border-1 border-primary text-center p-3 h-100">
                        @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Profile Avatar" style="max-width: 200px; max-height: 200px; height: 100%; width: 100%; object-fit: cover" class="border border-1 p-2 border-primary rounded-2 mb-3 align-self-center">
                        @else
                        <img src="{{ asset('assets/img/default-user.png') }}" alt="Profile Avatar" style="max-width: 200px; max-height: 200px; height: 100%; width: 100%; object-fit: cover" class="border border-1 p-2 border-primary rounded-2 mb-3 align-self-center">
                        @endif
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                            <h5 class="m-0 fw-bold">{{ $user->name }}</h5>
                            <a href="#" class="action" class="action" data-bs-toggle="modal" data-bs-target="#editModal"><i class="ph-duotone ph-pen"></i></a>
                        </div>
                        
                        <p>{{ $user->moto }}</p>
                        <span class="badge badge-outline-primary p-2">{{ $user->jobRole->name }}</span>
                        <div class="card border-0 p-2 mt-3 h-100">
                            <ul class="list-unstyled text-start">
                                <li>
                                    <p class="fw-semibold mb-0">Whatsapp:</p>
                                </li>
                                <li><span>{{ $user->phone }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Email:</p>
                                </li>
                                <li><span>{{ $user->email }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Lokasi:</p>
                                </li>
                                <li><span>{{ $user->location }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Pendidikan Terakhir:</p>
                                </li>
                                <li><span>{{ $user->education->name }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Pengalaman Kerja:</p>
                                </li>
                                <li><span>{{ $user->work_experience ?? '0'}} Tahun</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Jenis Kelamin:</p>
                                </li>
                                <li><span>{{ $user->gender }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Center Column -->
                <div class="col-lg-6 d-flex flex-column">
                    <div class="card border-1 border-primary p-3 mb-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Tentang Saya</h5>
                            <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#descriptionModal"><i class="ph-duotone ph-pen"></i></a>
                        </div>
                        <div class="text">
                            @if($user->description)
                                {!! $user->description !!}
                            @else
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-50" alt="">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card border-1 border-primary p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Pengalaman Kerja</h5>
                            <a href="#" class="action-add" class="add-experience" data-bs-toggle="modal" data-bs-target="#workExperienceModal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <div>
                            @forelse ($workExperiences as $experience)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title">{{ $experience->jobdesk }}</h6>
                                    <a href="#" class="action edit-experience"
                                        data-id="{{ $experience->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#workExperienceModal">
                                        <i class="ph-duotone ph-pen"></i>
                                        </a>
                                </div>
                                <p class="fw-semibold text-muted mb-1">{{ $experience->name }}</p>
                                <p class="fw-semibold mb-1">
                                    {{ $experience->start_date ? date('M Y', strtotime($experience->start_date)) : '-' }}
                                    -
                                    {{ $experience->end_date ? date('M Y', strtotime($experience->end_date)) : 'Sekarang' }}
                                </p>
                                <div class="text-secondary">{!! $experience->description !!}</div>
                            </div>
                            <hr>
                            @empty
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-50" alt="">
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-lg-3 d-flex flex-column gap-3">
                    <div class="card border-1 border-primary p-3 flex-fill">
                        <h5 class="fw-bold">Skill</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge badge-outline-primary p-2">Skill 1</span>
                            <span class="badge badge-outline-primary p-2">Skill 2</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                            <span class="badge badge-outline-primary p-2">Skill 3</span>
                        </div>
                    </div>
                    <div class="card border-1 border-primary p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Sosial Media</h5>
                            <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#socialMediaModal"><i class="ph-duotone ph-pen"></i></a>
                        </div>
                        <ul class="list-unstyled">
                            {{-- Periksa Media Sosial --}}
                            @if ($user && $user->socialMedia)
                            @php
                            $socialLinks = [
                            'instagram' => $user->socialMedia->instagram,
                            'github' => $user->socialMedia->github,
                            'youtube' => $user->socialMedia->youtube,
                            'website' => $user->socialMedia->website,
                            'linkedin' => $user->socialMedia->linkedin,
                            'tiktok' => $user->socialMedia->tiktok,
                            ];
                            @endphp

                            {{-- Looping untuk Media Sosial --}}
                            @foreach ($socialLinks as $platform => $link)
                            @if ($link)
                            <li>
                                <p>
                                    <span class="badge bg-primary rounded-pill p-2">
                                        @if ($platform === 'website')
                                        <i class="ph-duotone ph-globe"></i> {{-- Ikon untuk Website --}}
                                        @else
                                        <i class="ph-duotone ph-{{ $platform }}-logo"></i> {{-- Ikon untuk Platform Lain --}}
                                        @endif
                                    </span>
                                    <a href="{{ $link }}" target="_blank">
                                        {{ ucfirst($platform) }}
                                    </a>
                                </p>
                            </li>
                            @endif
                            @endforeach
                            @else
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="">
                            </div>
                            @endif
                        </ul>
                    </div>
                    <div class="card border-1 border-primary p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Lampiran</h5>
                            <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#attachmentModal"><i class="ph-duotone ph-pen"></i></a>
                        </div>
                        <ul class="list-unstyled">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-file" style="width: 24px;"></i>
                                <p class="card-text fw-semibold">{{ $user->attachment->cv ?? '-'}}</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-paperclip" style="width: 24px;"></i>
                                <a href="#" class="card-text fw-semibold">{{ $user->attachment->portfolio ?? '-'}}</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <!-- Kolom Kiri: Sertifikasi -->
                <div class="col-md-6">
                    <div class="card border-1 border-primary p-3 h-100">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Sertifikasi</h5>
                            <a href="#" class="action-add" class="add-certificate" data-bs-toggle="modal" data-bs-target="#certificateModal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <ul class="list-unstyled text-start">
                            @forelse ($certificates as $certificate)
                            <li>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-semibold mb-0">{{ $certificate->name }}</p>
                                    <a href="#" class="action"
                                        class="edit-certificate"
                                        data-id="{{ $certificate->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#certificateModal">
                                        <i class="ph-duotone ph-pen"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <p class="fw-normal mb-0">{{ $certificate->publisher }}</p>
                            </li>
                            <li>
                                <p class="text-muted mb-2">
                                    {{ $certificate->start_date ? date('M Y', strtotime($certificate->start_date)) : '-' }}
                                    -
                                    {{ $certificate->end_date ? date('M Y', strtotime($certificate->end_date)) : 'Sekarang' }}
                                </p>
                            </li>
                            @empty
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-50" alt="">
                            </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!-- Kolom Kanan: Pengalaman Organisasi -->
                <div class="col-md-6">
                    <div class="card border-1 border-primary p-3 h-100">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Pengalaman Organiasi</h5>
                            <a href="#" class="action-add" data-bs-toggle="modal" data-bs-target="#organizationExperienceModal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        @foreach($organizations as $organization)
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title m-0">{{ $organization->name }}</h6>
                                    <a href="#" 
                                        class="edit-organization action" 
                                        data-id="{{ $organization->id }}" 
                                        data-name="{{ $organization->name }}" 
                                        data-department="{{ $organization->department }}" 
                                        data-description="{{ $organization->description }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#organizationExperienceModal">
                                        <i class="ph-duotone ph-pen"></i>
                                    </a>
                                </div>
                                <p class="fw-semibold text-muted mb-1">{{ $organization->department }}</p>
                                <p class="text-secondary m-0">{!! $organization->description !!}</p>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal User -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to edit the user's details -->
                    <form action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Location Field -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ auth()->user()->location }}">
                        </div>

                        <!-- Corporate Field -->
                        <div class="mb-3">
                            <label for="education" class="form-label">Pendidikan</label>
                            <select class="form-control" id="education" name="education">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                @foreach ($educations as $edu)
                                <option value="{{ $edu->id }}"
                                    {{ $edu->id == $user->education_id ? 'selected' : '' }}>
                                    {{ $edu->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Job Role -->
                        <div class="mb-3">
                            <label for="job_role_id" class="form-label">Role</label>
                            <select class="form-control" id="job_role_id" name="job_role_id">
                                <option value="" disabled selected>Pilih Role</option>
                                @foreach ($jobRoles as $job)
                                <option value="{{ $job->id }}" {{ $job->id == $user->job_role_id ? 'selected' : '' }}>
                                    {{ $job->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Moto Field -->
                        <div class="mb-3">
                            <label for="moto" class="form-label">Moto</label>
                            <input type="text" class="form-control" id="moto" name="moto" value="{{ auth()->user()->moto }}">
                        </div>

                        <!-- Work Experience -->
                        <div class="mb-3">
                            <label for="work_experience" class="form-label">Pengalaman Kerja</label>
                            <input type="number" class="form-control" id="work_experience" name="work_experience" value="{{ auth()->user()->work_experience }}">
                        </div>

                        <!-- Gender Field -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">-- Pilih --</option>
                                <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <!-- Avatar Field -->
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Description -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ auth()->user()->description }}</textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Attachment -->
    <div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attachmentModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="cv" class="form-label">CV</label>
                            <input class="form-control" type="file" id="cv" name="cv" value="{{ old('cv', $user->attachment->cv ?? '-') }}" onchange="previewFile('cv')">
                            <p id="cv-preview" class="mt-2">File: {{ $user->attachment->cv ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="portfolio" class="form-label">Portfolio</label>
                            <input class="form-control" type="file" id="portfolio" name="portfolio" value="{{ old('portfolio', $user->attachment->portfolio ?? '-') }}" onchange="previewFile('portfolio')">
                            <p id="portfolio-preview" class="mt-2">File: {{ $user->attachment->portfolio ?? '-' }}</p>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sosmed Modal -->
    <div class="modal fade" id="socialMediaModal" tabindex="-1" aria-labelledby="socialMediaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="socialMediaModalLabel">Tambah/Edit Sosial Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('social-media.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $user->socialMedia->instagram ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="text" class="form-control" id="github" name="github" value="{{ old('github', $user->socialMedia->github ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="youtube" class="form-label">YouTube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $user->socialMedia->youtube ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $user->socialMedia->website ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $user->socialMedia->linkedin ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $user->socialMedia->tiktok ?? '') }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Work Experience -->
    <div class="modal fade" id="workExperienceModal" tabindex="-1" aria-labelledby="workExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="workExperienceModalLabel">Tambah/Edit Pengalaman Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="workExperienceForm" action="{{ route('work-experience.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="id" id="experienceId" value="">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                        <div class="mb-3">
                            <label for="jobdesk" class="form-label">Jobdesk</label>
                            <input type="text" class="form-control" id="jobdesk" name="jobdesk" value="">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <div id="quill-editor" class="mb-3"></div>
                            <textarea rows="3" class="mb-3 d-none" name="description" id="quill-editor-area"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="">
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                class="btn btn-danger delete-experience"
                                data-id=""
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                Hapus
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Work Experience -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pengalaman Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus pengalaman kerja ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Organization -->
    <div class="modal fade" id="deleteModalOrganizations" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pengalaman Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus pengalaman organisasi ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="deleteFormOrganizations" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Certificate -->
    <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificateModalLabel">Tambah/Edit Pengalaman Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="certificateForm" action="{{ route('certification.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="formCertificateMethod" value="POST">
                        <input type="hidden" name="id" id="certificateId" value="">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Sertifikat</label>
                            <input type="text" class="form-control" id="nameCertificate" name="name" value="">
                        </div>
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="publisher" name="publisher" value="">
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date_certificate" name="start_date" value="">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end_date_certificate" name="end_date" value="">
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                class="btn btn-danger delete-certificate"
                                data-id=""
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCertificateModal">
                                Hapus
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Certificate -->
    <div class="modal fade" id="deleteCertificateModal" tabindex="-1" aria-labelledby="deleteCertificateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCertificateModalLabel">Hapus Sertifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus sertifikasi ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="deleteCertificateForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Organization Experience -->
    <div class="modal fade" id="organizationExperienceModal" tabindex="-1" aria-labelledby="organizationExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="organizationExperienceModalLabel">Tambah/Edit Pengalaman Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="organizationExperienceForm" action="{{ route('organizations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="formMethodOrganizations" value="POST">
                        <input type="hidden" name="idOrganization" id="organizationId" value="">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Organisasi</label>
                            <input type="text" class="form-control" id="nameOrganizations" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Divisi</label>
                            <input type="text" class="form-control" id="department" name="department">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionOrganizations" class="form-label">Deskripsi</label>
                            <div id="quill-editor-organizations" class="mb-3"></div>
                            <textarea rows="3" class="d-none" name="description" id="quill-editor-area-organizations"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="deleteOrganizationBtn" data-id="" style="display: none;">Hapus</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const modal = $('#workExperienceModal');
        const form = $('#workExperienceForm');
        const methodField = $('#formMethod');
        const idField = $('#experienceId');

        // Inisialisasi Quill Editor
        const quillEditor = new Quill('#quill-editor', {
            theme: 'snow'
        });
        const quillEditorArea = $('#quill-editor-area');

        $('.action-add, .edit-experience').on('click', function () {
            const isEdit = $(this).hasClass('edit-experience');
            const experienceId = $(this).data('id');
            const actionUrl = isEdit ? `/work-experience/${experienceId}` : `/work-experience`;
            const method = isEdit ? 'PUT' : 'POST';

            form.attr('action', actionUrl);
            methodField.val(method);
            idField.val(isEdit ? experienceId : '');

            if (isEdit) {
                $.ajax({
                    url: `/work-experience/${experienceId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#name').val(data.name || '');
                        $('#jobdesk').val(data.jobdesk || '');
                        
                        // Set value ke Quill Editor
                        quillEditor.root.innerHTML = data.description || '';

                        // Set nilai input tanggal
                        $('#start_date').val(data.start_date || '').change();
                        $('#end_date').val(data.end_date || '').change();

                        // Set data-id tombol hapus
                        $('.delete-experience').data('id', experienceId);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                form.trigger('reset');
                quillEditor.root.innerHTML = '';
                $('.delete-experience').data('id', '').hide();
            }
        });

        modal.on('hidden.bs.modal', function () {
            form.trigger('reset');
            quillEditor.root.innerHTML = '';
        });

        // Simpan perubahan dari Quill Editor ke textarea sebelum submit
        quillEditor.on('text-change', function () {
            quillEditorArea.val(quillEditor.root.innerHTML);
        });

        // Konfigurasi modal hapus
        const deleteModal = $('#deleteModal');
        const deleteForm = $('#deleteForm');

        $('.delete-experience').on('click', function () {
            const experienceId = $(this).data('id');
            if (experienceId) {
                const deleteUrl = `/work-experience/${experienceId}`;
                deleteForm.attr('action', deleteUrl);
                deleteModal.modal('show');
            }
        });

        deleteModal.on('hidden.bs.modal', function () {
            deleteForm.attr('action', '');
        });
    });

    $(document).ready(function() {
        const modal = $('#certificateModal');
        const form = $('#certificateForm');
        const methodField = $('#formCertificateMethod');
        const idField = $('#certificateId');

        $('.add-certificate, .edit-certificate').on('click', function() {
            const isEdit = $(this).hasClass('edit-certificate');
            const actionUrl = isEdit ? `/certification/${$(this).data('id')}` : `/certification`;
            const method = isEdit ? 'PUT' : 'POST';

            form.attr('action', actionUrl);
            methodField.val(method);
            idField.val(isEdit ? $(this).data('id') : '');

            if (isEdit) {
                $.ajax({
                    url: `/certification/${$(this).data('id')}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#nameCertificate').val(data.name || '');
                        $('#publisher').val(data.publisher || '');
                        $('#start_date_certificate').val(data.start_date || '');
                        $('#end_date_certificate').val(data.end_date || '');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    },
                });
            } else {
                form.trigger('reset');
            }
        });

        modal.on('hidden.bs.modal', function() {
            form.trigger('reset');
        });

        const deleteModal = $('#deleteCertificateModal');
        const deleteForm = $('#deleteCertificateForm');

        $('.delete-certificate').on('click', function() {
            const certificateId = $('#certificateId').val();
            const deleteUrl = `/certification/${certificateId}`;
            deleteForm.attr('action', deleteUrl);
            deleteModal.modal('show');
        });

        deleteModal.on('hidden.bs.modal', function() {
            deleteForm.attr('action', '');
        });
    });
    $(document).ready(function () {
        const modal = $('#organizationExperienceModal');
        const form = $('#organizationExperienceForm');
        const methodField = $('#formMethodOrganizations');
        const idField = $('#organizationId');
        const deleteModal = $('#deleteModalOrganizations');
        const deleteForm = $('#deleteFormOrganizations');

        const quillEditorOrganizations = new Quill('#quill-editor-organizations', {
            theme: 'snow'
        });
        const quillEditorAreaOrganizations = $('#quill-editor-area-organizations');

        $('.action-add, .edit-organization').on('click', function () {
            const isEdit = $(this).hasClass('edit-organization');
            const orgId = $(this).data('id');

            if (isEdit) {
                form.attr('action', `/organizations/${orgId}`);
                methodField.val('PUT');
                idField.val(orgId);

                $.ajax({
                    url: `/organizations/${orgId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#nameOrganizations').val(data.name || '');
                        $('#department').val(data.department || '');
                        quillEditorOrganizations.root.innerHTML = data.description || '';
                        $('#deleteOrganizationBtn').data('id', orgId).show();
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                form.attr('action', '/organizations');
                methodField.val('POST');
                idField.val('');
                form.trigger('reset');
                quillEditorOrganizations.root.innerHTML = '';
                $('#deleteOrganizationBtn').hide();
            }
        });

        quillEditorOrganizations.on('text-change', function () {
            quillEditorAreaOrganizations.val(quillEditorOrganizations.root.innerHTML);
        });

        modal.on('hidden.bs.modal', function () {
            form.trigger('reset');
            methodField.val('POST');
            quillEditorOrganizations.root.innerHTML = '';
        });

        $('#deleteOrganizationBtn').on('click', function () {
            const orgId = $(this).data('id');
            if (orgId) {
                modal.modal('hide');
                modal.on('hidden.bs.modal', function () {
                    deleteForm.attr('action', `/organizations/${orgId}`);
                    deleteModal.modal('show');
                });
            }
        });

        deleteModal.on('hidden.bs.modal', function () {
            deleteForm.attr('action', '');
        });

        deleteForm.on('submit', function (e) {
            e.preventDefault();
            const deleteUrl = deleteForm.attr('action');

            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: deleteForm.serialize(),
                success: function (response) {
                    deleteModal.modal('hide');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error('Error deleting data:', error);
                }
            });
        });
    });

</script>

</html>