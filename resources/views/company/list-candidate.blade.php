<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Kandidat</title>
    <link rel="stylesheet" href="/css/style.css">
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
                            <a class="nav-link active fw-bold" href="/company-job-work">List Pekerjaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container py-3 body-list">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold mb-0">Daftar Kandidat - {{ $jobWork->name }}</h3>
                        <a href="{{ route('company-job-work.show', $jobWork->id) }}" class="btn btn-outline-primary py-1 px-2">
                            <i class="ph-duotone ph-arrow-left me-1"></i> Kembali ke Detail Pekerjaan
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-1 border-primary mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <p class="mb-1 text-muted">Total Pelamar</p>
                            <h4 class="fw-bold">{{ count($jobWork->candidates) }}</h4>
                        </div>
                        <div class="col-md-3 text-center">
                            <p class="mb-1 text-muted">Sedang Ditinjau</p>
                            <h4 class="fw-bold">{{ $jobWork->candidates()->where('status', \App\Models\Candidate::STATUS_REVIEW)->count() }}</h4>
                        </div>
                        <div class="col-md-3 text-center">
                            <p class="mb-1 text-muted">Diterima</p>
                            <h4 class="fw-bold text-success">{{ $jobWork->candidates()->where('status', \App\Models\Candidate::STATUS_ACCEPTED)->count() }}</h4>
                        </div>
                        <div class="col-md-3 text-center">
                            <p class="mb-1 text-muted">Ditolak</p>
                            <h4 class="fw-bold text-danger">{{ $jobWork->candidates()->where('status', \App\Models\Candidate::STATUS_REJECTED)->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter dan Search -->
            <div class="card border-1 border-primary mb-4">
                <div class="card-body">
                    <form action="{{ route('candidates.index', $jobWork->id) }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="status" class="form-label">Filter Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Semua Status</option>
                                    <option value="{{ \App\Models\Candidate::STATUS_PENDING }}" {{ request('status') == \App\Models\Candidate::STATUS_PENDING ? 'selected' : '' }}>Menunggu</option>
                                    <option value="{{ \App\Models\Candidate::STATUS_REVIEW }}" {{ request('status') == \App\Models\Candidate::STATUS_REVIEW ? 'selected' : '' }}>Sedang Ditinjau</option>
                                    <option value="{{ \App\Models\Candidate::STATUS_ACCEPTED }}" {{ request('status') == \App\Models\Candidate::STATUS_ACCEPTED ? 'selected' : '' }}>Diterima</option>
                                    <option value="{{ \App\Models\Candidate::STATUS_REJECTED }}" {{ request('status') == \App\Models\Candidate::STATUS_REJECTED ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="search" class="form-label">Cari Kandidat</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Cari berdasarkan nama atau email" value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="ph-duotone ph-magnifying-glass me-1"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(count($candidates) > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kandidat</th>
                            <th>Role</th>
                            <th>Pendidikan</th>
                            <th>Tanggal Apply</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $index => $candidate)
                        <tr>
                            <td>{{ $candidates->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($candidate->user->avatar)
                                    <img src="{{ asset('storage/avatars/' . $candidate->user->avatar) }}" alt="{{ $candidate->user->name }}" class="rounded-circle me-2 border border-1 border-primary" width="40" height="40" style="object-fit: cover;">
                                    @else
                                    <img src="{{ asset('assets/img/default-user.png') }}" alt="{{ $candidate->user->name }}" class="rounded-circle me-2 border border-1 border-primary" width="40" height="40">
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $candidate->user->name }}</div>
                                        <small class="text-muted">{{ $candidate->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($candidate->user->jobRole)
                                {{ $candidate->user->jobRole->name }}
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($candidate->user->education)
                                {{ $candidate->user->education->name }}
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $candidate->created_at->format('d M Y') }}</td>
                            <td>
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
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-primary py-1 px-2 text-white">
                                        <i class="ph-duotone ph-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#statusModal{{ $candidate->id }}">
                                        <i class="ph-duotone ph-pen"></i>
                                    </button>
                                </div>

                                <!-- Modal Update Status -->
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $candidates->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <img src="{{ asset('assets/img/notfound.png') }}" class="opacity-50 w-25 mb-3" alt="">
                <h5 class="text-muted">Belum ada kandidat yang melamar</h5>
            </div>
            @endif
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
                            // Update the badge on the page
                            let badgeHtml = '';
                            
                            if (status == '{{ \App\Models\Candidate::STATUS_PENDING }}') {
                                badgeHtml = '<span class="badge bg-warning">Menunggu</span>';
                            } else if (status == '{{ \App\Models\Candidate::STATUS_REVIEW }}') {
                                badgeHtml = '<span class="badge bg-info">Sedang Ditinjau</span>';
                            } else if (status == '{{ \App\Models\Candidate::STATUS_ACCEPTED }}') {
                                badgeHtml = '<span class="badge bg-success">Diterima</span>';
                            } else if (status == '{{ \App\Models\Candidate::STATUS_REJECTED }}') {
                                badgeHtml = '<span class="badge bg-danger">Ditolak</span>';
                            }
                            
                            $('#status-badge-' + candidateId).html(badgeHtml);
                            
                            // Close the modal
                            $('#statusModal' + candidateId).modal('hide');
                            
                            // Show alert
                            const alertHtml = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    ${response.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;
                            $('.body-list').prepend(alertHtml);
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