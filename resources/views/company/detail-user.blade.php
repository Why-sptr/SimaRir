<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
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
</head>

<body>
    <section>
        <div class="container mt-4">
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-3">
                    <div class="card shadow-sm border-0 text-center p-3 h-100">
                        <img src="{{ asset('storage/avatars/' . $candidate->user->avatar) }}" alt="Profile Avatar" style="max-width: 200px; max-height: 200px; height: 100%; width: 100%; object-fit: cover" class="rounded-circle mb-3 align-self-center border border-2">
                        <div class="d-flex justify-content-center gap-2">
                            <h5 class="mb-3 fw-bold">{{ $candidate->user->name }}</h5>
                        </div>
                        <p class="fw-semibold">{{ $candidate->user->jobRole->name }}</p>
                        <p>{{ $candidate->user->moto }}</p>
                        <div class="card shadow-sm border-0 p-2 mt-3 h-100">
                            <ul class="list-unstyled text-start">
                                <li>
                                    <p class="fw-semibold mb-0">Whatsapp:</p>
                                </li>
                                <li><span>{{ $candidate->user->phone }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Email:</p>
                                </li>
                                <li><span>{{ $candidate->user->email }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Lokasi:</p>
                                </li>
                                <li><span>{{ $candidate->user->location }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Pendidikan Terakhir:</p>
                                </li>
                                <li><span>{{ $candidate->user->education->name }}</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Pengalaman Kerja:</p>
                                </li>
                                <li><span>{{ $candidate->user->work_experience ?? '-'}} Tahun</span></li>
                                <li>
                                    <p class="fw-semibold mb-0">Jenis Kelamin:</p>
                                </li>
                                <li><span>{{ $candidate->user->gender }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Center Column -->
                <div class="col-lg-6 d-flex flex-column">
                    <div class="card shadow-sm border-0 p-3 mb-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Tentang Saya</h5>
                        </div>
                        <div class="text">
                            {!! $candidate->user->description !!}
                        </div>
                    </div>
                    <div class="card shadow-sm border-0 p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Pengalaman Kerja</h5>
                        </div>
                        <div>
                            @if ($candidate->user->recentWorkExperiences)
                            @foreach ($candidate->user->recentWorkExperiences as $experience)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title">{{ $experience->jobdesk }}</h6>
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
                            @endforeach
                            @else
                            <p class="text-muted">Belum ada pengalaman kerja yang ditambahkan.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-lg-3 d-flex flex-column gap-3">
                    <div class="card shadow-sm border-0 p-3 flex-fill">
                        <h5 class="fw-bold">Skill</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-secondary p-2">Skill 1</span>
                            <span class="badge bg-secondary p-2">Skill 2</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                            <span class="badge bg-secondary p-2">Skill 3</span>
                        </div>
                    </div>
                    <div class="card shadow-sm border-0 p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Sosial Media</h5>
                        </div>
                        <ul class="list-unstyled">
                            @if ($candidate->user->socialMedia)
                            @php
                            $socialLinks = [
                            'instagram' => $candidate->user->socialMedia->instagram,
                            'github' => $candidate->user->socialMedia->github,
                            'youtube' => $candidate->user->socialMedia->youtube,
                            'website' => $candidate->user->socialMedia->website,
                            'linkedin' => $candidate->user->socialMedia->linkedin,
                            'tiktok' => $candidate->user->socialMedia->tiktok,
                            ];
                            @endphp

                            @foreach ($socialLinks as $platform => $link)
                            @if ($link)
                            <li>
                                <p>
                                    <span class="badge bg-light text-dark">
                                        @if ($platform === 'website')
                                        <i class="fa-solid fa-globe"></i>
                                        @else
                                        <i class="fa-brands fa-{{ $platform }}"></i>
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
                            <p>Media sosial belum ditambahkan.</p>
                            @endif
                        </ul>
                    </div>
                    <div class="card shadow-sm border-0 p-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Lampiran</h5>
                        </div>
                        <ul class="list-unstyled">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-file" style="width: 24px;"></i>
                                <p class="card-text fw-semibold">{{ $candidate->user->attachment->cv ?? '-'}}</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-paperclip" style="width: 24px;"></i>
                                <a href="#" class="card-text fw-semibold">{{ $candidate->user->attachment->portfolio ?? '-'}}</a>
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
                    <div class="card shadow-sm border-0 p-3 h-100">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Sertifikasi</h5>
                        </div>
                        <ul class="list-unstyled text-start">
                            @if (!empty($candidate->user->certifications))
                            @foreach ($candidate->user->certifications as $certificate)
                            <li>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-semibold mb-0">{{ $certificate->name }}</p>
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
                            @endforeach
                            @else
                            <p class="text-muted">Belum ada sertifikasi yang ditambahkan.</p>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Kolom Kanan: Pengalaman Kerja -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 p-3 h-100">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Pengalaman Organisasi</h5>
                        </div>
                        <div>
                            @if(!empty($candidate->user->organizations))
                            @foreach ($candidate->user->organizations as $organization)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title">{{ $organization->name }}</h6>
                                </div>
                                <p class="fw-semibold text-muted mb-1">{{ $organization->departement }}</p>
                                <p class="fw-semibold mb-1">
                                    {{ $organization->start_date ? date('M Y', strtotime($organization->start_date)) : '-' }}
                                    -
                                    {{ $organization->end_date ? date('M Y', strtotime($organization->end_date)) : 'Sekarang' }}
                                </p>
                                <div class="text-secondary">{!! $organization->description !!}</div>
                            </div>
                            <hr>
                            @endforeach
                            @else
                            <p class="text-muted">Belum ada pengalaman organisasi yang ditambahkan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>