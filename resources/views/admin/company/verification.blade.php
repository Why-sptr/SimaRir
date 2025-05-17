<!-- resources/views/admin/verification/index.blade.php -->
@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                        <h5 class="card-title m-0">Verifikasi Perusahaan</h5>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Email</th>
                                    <th>Bidang Usaha</th>
                                    <th>Jumlah Karyawan</th>
                                    <th>Status Verifikasi</th>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $index => $company)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $company->user->name }}</td>
                                    <td>{{ $company->user->email }}</td>
                                    <td>{{ $company->corporateField->name ?? '-' }}</td>
                                    <td>{{ $company->employee ?? '-' }}</td>
                                    <td>
                                        @if($company->status_verification == '1')
                                        <span class="badge rounded-pill bg-success">Terverifikasi</span>
                                        @elseif($company->status_verification == '0')
                                        <span class="badge rounded-pill bg-danger">Ditolak</span>
                                        @else
                                        <span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($company->verification_file)
                                        <a href="{{ asset('storage/verification/' . $company->verification_file) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="bi bi-file-earmark"></i> Lihat
                                        </a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            @if($company->status_verification != 'approved' && $company->status_verification != 'rejected')
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-check-circle"></i> Verifikasi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form action="{{ route('verification.process', $company->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="approved">
                                                            <button type="submit" class="dropdown-item text-success">
                                                                <i class="bi bi-check-circle"></i> Setujui
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('verification.process', $company->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="rejected">
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="bi bi-x-circle"></i> Tolak
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data perusahaan yang meminta verifikasi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('.datatable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        });
    });
</script>
@endsection