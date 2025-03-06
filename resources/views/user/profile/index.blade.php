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
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-whatsapp-logo text-primary"></i>
                                    <p class="fw-semibold mb-0">Whatsapp:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->phone }}</p></li>
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-envelope text-primary"></i>
                                    <p class="fw-semibold mb-0">Email:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->email }}</p></li>
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-map-pin-area text-primary"></i>
                                    <p class="fw-semibold mb-0 text">Lokasi:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->location }}</p></li>
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-graduation-cap text-primary"></i>
                                    <p class="fw-semibold mb-0">Pendidikan Terakhir:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->education->name }}</p></li>
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-briefcase text-primary"></i>
                                    <p class="fw-semibold mb-0">Pengalaman Kerja:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->work_experience ?? '0'}} Tahun</p></li>
                                <li class="d-flex gap-2 align-items-center">
                                    <i class="ph-duotone ph-gender-intersex text-primary"></i>
                                    <p class="fw-semibold mb-0">Jenis Kelamin:</p>
                                </li>
                                <li><p class="mb-2">{{ $user->gender }}</p></li>
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
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3 fw-bold">Skill</h5>
                            <a href="#" class="action" data-bs-toggle="modal" data-bs-target="#skillModal">
                                <i class="ph-duotone ph-pen"></i>
                            </a>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            {{-- Periksa Skill User --}}
                            @if ($user && $user->skills->isNotEmpty())
                            @foreach ($user->skills as $skill)
                            <span class="badge badge-outline-primary p-2">
                                <i class="ph-duotone ph-lightning"></i> {{-- Ikon untuk Skill --}}
                                {{ $skill->name }}
                            </span>
                            @endforeach
                            @else
                            <div class="text-center">
                                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-100" alt="No Skills Found">
                            </div>
                            @endif
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
                                <i class="ph-duotone ph-files text-primary" style="width: 24px;"></i>
                                <a href="{{ asset('storage/attachments/' . $user->attachment->cv) }}" target="_blank" class="card-text fw-semibold">{{ $user->attachment->cv ?? '-'}}</a>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <i class="ph-duotone ph-paperclip text-primary" style="width: 24px;"></i>
                                <a href="{{ asset('storage/attachments/' . $user->attachment->portfolio) }}" target="_blank" class="card-text fw-semibold">{{ $user->attachment->portfolio ?? '-'}}</a>
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
                                    <a href="#" class="action edit-certificate"
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
                            <hr>
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
                        @forelse($organizations as $organization)
                        <div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semibold mb-0">{{ $organization->name }}</p>
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
                            <div class="text-secondary mb-0">{!! $organization->description !!}</div>
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
        </div>
    </section>
    @include('user.profile.modal.modal-user')
    @include('user.profile.modal.modal-description')
    @include('user.profile.modal.modal-attachment')
    @include('user.profile.modal.modal-sosmed')
    @include('user.profile.modal.modal-work-experience')
    @include('user.profile.modal.modal-delete-work-experience')
    @include('user.profile.modal.modal-certificate')
    @include('user.profile.modal.modal-delete-certificate')
    @include('user.profile.modal.modal-organizations')
    @include('user.profile.modal.modal-delete-organizations')
    @include('user.profile.modal.modal-skill')
</body>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        const modal = $('#workExperienceModal');
        const form = $('#workExperienceForm');
        const methodField = $('#formMethod');
        const idField = $('#experienceId');

        const quillEditor = new Quill('#quill-editor', {
            theme: 'snow'
        });
        const quillEditorArea = $('#quill-editor-area');

        $('.action-add, .edit-experience').on('click', function() {
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
                    success: function(data) {
                        $('#name').val(data.name || '');
                        $('#jobdesk').val(data.jobdesk || '');

                        quillEditor.root.innerHTML = data.description || '';

                        $('#start_date').val(data.start_date || '').change();
                        $('#end_date').val(data.end_date || '').change();

                        $('.delete-experience').data('id', experienceId).show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                form.trigger('reset');
                quillEditor.root.innerHTML = '';
                $('.delete-experience').data('id', '').hide();
            }
        });

        modal.on('hidden.bs.modal', function() {
            form.trigger('reset');
            quillEditor.root.innerHTML = '';
            $('.delete-experience').data('id', '').hide();
        });

        quillEditor.on('text-change', function() {
            quillEditorArea.val(quillEditor.root.innerHTML);
        });

        const deleteModal = $('#deleteModal');
        const deleteForm = $('#deleteForm');

        $('.delete-experience').on('click', function() {
            const experienceId = $(this).data('id');
            if (experienceId) {
                const deleteUrl = `/work-experience/${experienceId}`;
                deleteForm.attr('action', deleteUrl);
                deleteModal.modal('show');
            }
        });

        deleteModal.on('hidden.bs.modal', function() {
            deleteForm.attr('action', '');
        });
    });

    $(document).ready(function() {
        const modal = $('#certificateModal');
        const form = $('#certificateForm');
        const methodField = $('#formCertificateMethod');
        const idField = $('#certificateId');

        $('.action-add, .edit-certificate').on('click', function() {
            const isEdit = $(this).hasClass('edit-certificate');
            const certificateId = $(this).data('id');
            const actionUrl = isEdit ? `/certification/${certificateId}` : `/certification`;
            const method = isEdit ? 'PUT' : 'POST';

            form.attr('action', actionUrl);
            methodField.val(method);
            idField.val(isEdit ? certificateId : '');

            if (isEdit) {
                $.ajax({
                    url: `/certification/${certificateId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#nameCertificate').val(data.name || '');
                        $('#publisher').val(data.publisher || '');
                        $('#start_date_certificate').val(data.start_date || '').change();
                        $('#end_date_certificate').val(data.end_date || '').change();

                        $('.delete-certificate').data('id', certificateId).show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                form.trigger('reset');
                $('.delete-certificate').data('id', '').hide();
            }
        });

        modal.on('hidden.bs.modal', function() {
            form.trigger('reset');
        });

        const deleteModal = $('#deleteCertificateModal');
        const deleteForm = $('#deleteCertificateForm');

        $('.delete-certificate').on('click', function() {
            const certificateId = $(this).data('id');
            if (certificateId) {
                const deleteUrl = `/certification/${certificateId}`;
                deleteForm.attr('action', deleteUrl);
                deleteModal.modal('show');
            }
        });

        deleteModal.on('hidden.bs.modal', function() {
            deleteForm.attr('action', '');
        });
    });

    $(document).ready(function() {
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

        $('.action-add, .edit-organization').on('click', function() {
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
                    success: function(data) {
                        $('#nameOrganizations').val(data.name || '');
                        $('#department').val(data.department || '');
                        quillEditorOrganizations.root.innerHTML = data.description || '';
                        $('#deleteOrganizationBtn').data('id', orgId).show();
                    },
                    error: function(xhr, status, error) {
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

        quillEditorOrganizations.on('text-change', function() {
            quillEditorAreaOrganizations.val(quillEditorOrganizations.root.innerHTML);
        });

        modal.on('hidden.bs.modal', function() {
            form.trigger('reset');
            methodField.val('POST');
            quillEditorOrganizations.root.innerHTML = '';
        });

        $('#deleteOrganizationBtn').on('click', function() {
            const orgId = $(this).data('id');
            if (orgId) {
                modal.modal('hide');
                modal.on('hidden.bs.modal', function() {
                    deleteForm.attr('action', `/organizations/${orgId}`);
                    deleteModal.modal('show');
                });
            }
        });

        deleteModal.on('hidden.bs.modal', function() {
            deleteForm.attr('action', '');
        });

        deleteForm.on('submit', function(e) {
            e.preventDefault();
            const deleteUrl = deleteForm.attr('action');

            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: deleteForm.serialize(),
                success: function(response) {
                    deleteModal.modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting data:', error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Pilih skill",
            allowClear: true,
            width: '100%'
        });

        // Pastikan Select2 tetap bekerja dalam modal
        $('#skillModal').on('shown.bs.modal', function() {
            $('#skills').select2({
                dropdownParent: $('#skillModal'),
                width: '100%'
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
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
                    suggestionItem.onclick = function () {
                        locationInput.value = city.name;
                        suggestionsBox.style.display = "none";
                    };
                    suggestionsBox.appendChild(suggestionItem);
                });
            } else {
                suggestionsBox.style.display = "none";
            }
        }

        locationInput.addEventListener("input", function () {
            let query = this.value.trim();
            if (query.length > 2) { 
                showSuggestions(query);
            } else {
                suggestionsBox.style.display = "none";
            }
        });

        document.addEventListener("click", function (e) {
            if (!suggestionsBox.contains(e.target) && e.target !== locationInput) {
                suggestionsBox.style.display = "none";
            }
        });

        fetchCities();
    });

</script>

</html>