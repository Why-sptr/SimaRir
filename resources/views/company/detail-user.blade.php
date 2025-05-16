<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
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
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <a class="nav-link fw-semibold" href="/company">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work/create">Upload Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/company-job-work">List Pekerjaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container mt-4">
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="card bg-white border border-1 border-primary h-100">
                        @if($candidate->status == \App\Models\Candidate::STATUS_ACCEPTED)
                        <div class="alert bg-white border-0 m-0 p-3" role="alert">
                            <div class="card border-0 h-100">
                                <div class="row gap-2 px-2">
                                    <div class="p-0 m-0 col">
                                        @php
                                        $whatsappNumber = $candidate->user->phone;
                                        $whatsappNumber = str_replace('-', '', $whatsappNumber);
                                        if (substr($whatsappNumber, 0, 1) === '0') {
                                        $whatsappNumber = '62' . substr($whatsappNumber, 1);
                                        }
                                        $jobName = $jobWork->name ?? 'Lowongan Pekerjaan';
                                        $whatsappMessage = "Halo " . $candidate->user->name . ", saya tertarik dengan lamaran Anda untuk posisi " . $jobName;
                                        $whatsappLink = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($whatsappMessage);
                                        @endphp
                                        <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-sm btn-outline-primary px-2 py-1 col-md-12">
                                            <i class="fa-brands fa-whatsapp"></i> Hubungi
                                        </a>
                                    </div>
                                    <div class="p-0 m-0 col">
                                        @php
                                        $subject = "Lowongan " . ($jobWork->name ?? "Pekerjaan");
                                        $body = "Halo " . $candidate->user->name . ",%0D%0A%0D%0ASaya tertarik dengan lamaran Anda untuk posisi " . ($jobWork->name ?? "Lowongan Pekerjaan") . ".%0D%0A%0D%0ATerima kasih,%0D%0A" . auth()->user()->name;
                                        $mailtoLink = "mailto:" . $candidate->user->email . "?subject=" . urlencode($subject) . "&body=" . $body;
                                        @endphp
                                        <a href="{{ $mailtoLink }}" class="btn btn-sm btn-primary px-2 py-1 text-white col-md-12">
                                            <i class="fa-regular fa-envelope"></i> Email
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100 p-3">
                            <p class="text-center text-muted mb-0">
                                Kontak kandidat akan tersedia setelah status diubah menjadi "Diterima"
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-white border border-1 border-primary h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div id="status-badge-{{ $candidate->id }}">
                                @if($candidate->status == \App\Models\Candidate::STATUS_PENDING)
                                <span class="badge bg-warning">Menunggu</span>
                                @elseif($candidate->status == \App\Models\Candidate::STATUS_REVIEW)
                                <span class="badge bg-info">Sedang Ditinjau</span>
                                @elseif($candidate->status == \App\Models\Candidate::STATUS_ACCEPTED)
                                <span class="badge bg-success">Diterima</span>
                                @elseif($candidate->status == \App\Models\Candidate::STATUS_REJECTED)
                                <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#statusModal{{ $candidate->id }}">
                                <i class="ph-duotone ph-pen"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="statusModal{{ $candidate->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $candidate->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="statusModalLabel{{ $candidate->id }}">Ubah Status Kandidat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateStatusForm{{ $candidate->id }}">
                                        <div class="mb-3">
                                            <label for="candidateStatus{{ $candidate->id }}" class="form-label">Status</label>
                                            <select class="form-select" id="candidateStatus{{ $candidate->id }}" name="status">
                                                <option value="{{ \App\Models\Candidate::STATUS_PENDING }}" {{ $candidate->status == \App\Models\Candidate::STATUS_PENDING ? 'selected' : '' }}>Menunggu</option>
                                                <option value="{{ \App\Models\Candidate::STATUS_REVIEW }}" {{ $candidate->status == \App\Models\Candidate::STATUS_REVIEW ? 'selected' : '' }}>Sedang Ditinjau</option>
                                                <option value="{{ \App\Models\Candidate::STATUS_ACCEPTED }}" {{ $candidate->status == \App\Models\Candidate::STATUS_ACCEPTED ? 'selected' : '' }}>Diterima</option>
                                                <option value="{{ \App\Models\Candidate::STATUS_REJECTED }}" {{ $candidate->status == \App\Models\Candidate::STATUS_REJECTED ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary updateStatusBtn" data-candidate-id="{{ $candidate->id }}">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-3">
                    <div class="card border-1 border-primary text-center p-3 h-100">
                        <img src="{{ asset('storage/avatars/' . $candidate->user->avatar) }}" alt="Profile Avatar" style="max-width: 200px; max-height: 200px; height: 100%; width: 100%; object-fit: cover" class="border border-1 p-2 border-primary rounded-2 mb-3 align-self-center">
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                            <h5 class="m-0 fw-bold">{{ $candidate->user->name }}</h5>
                        </div>
                        <p>{{ $candidate->user->moto }}</p>
                        <span class="badge badge-outline-primary p-2">{{ $candidate->user->jobRole->name }}</span>
                        <div class="card border-0 p-2 mt-3 h-100">
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
                                <li><span>{{ $candidate->user->work_experience ?? '0'}} Tahun</span></li>
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
                    <div class="card border-1 border-primary p-3 mb-3 flex-fill">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Tentang Saya</h5>
                        </div>
                        <div class="text">
                            {!! $candidate->user->description !!}
                        </div>
                    </div>
                    <div class="card border-1 border-primary p-3 flex-fill">
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
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="">
                            </div>
                            @endif
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
                                    <span class="badge bg-primary rounded-pill p-2">
                                        @if ($platform === 'website')
                                        <i class="ph-duotone ph-globe"></i>
                                        @else
                                        <i class="ph-duotone ph-{{ $platform }}-logo"></i>
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
                    <div class="card border-1 border-primary p-3 h-100">
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
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="">
                            </div>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Kolom Kanan: Pengalaman Kerja -->
                <div class="col-md-6">
                    <div class="card border-1 border-primary p-3 h-100">
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
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    $(document).ready(function() {
        $('.updateStatusBtn').click(function() {
            const candidateId = $(this).data('candidate-id');
            const status = $('#candidateStatus' + candidateId).val();

            $.ajax({
                url: '/candidates/' + candidateId,
                type: 'PUT',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Close the modal
                        $('#statusModal' + candidateId).modal('hide');

                        // Refresh the page to update all elements
                        window.location.reload();
                    }
                },
                error: function(xhr) {
                    console.error('Error updating status:', xhr);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });
    });
</script>

</html>