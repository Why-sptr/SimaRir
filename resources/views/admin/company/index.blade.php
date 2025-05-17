<!-- resources/views/admin/company/index.blade.php -->
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
                        <h5 class="card-title m-0">List Perusahaan</h5>
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
                                    <th>Avatar</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Email</th>
                                    <th>Bidang Usaha</th>
                                    <th>Jumlah Karyawan</th>
                                    <th>Status Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $index => $company)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($company->user->avatar)
                                        @if(Str::startsWith($company->user->avatar, 'http'))
                                        <img src="{{ $company->user->avatar }}" alt="Avatar" class="rounded-circle" width="40" height="40">
                                        @else
                                        <img src="{{ asset('storage/avatars/' . $company->user->avatar) }}" alt="Avatar" class="rounded-circle object-fit-cover border border-1 border-primary" width="40" height="40">
                                        @endif
                                        @else
                                        <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                                            {{ substr($company->user->name, 0, 1) }}
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $company->user->name }}</td>
                                    <td>{{ $company->user->email }}</td>
                                    <td>{{ $company->corporateField->name ?? '-' }}</td>
                                    <td>{{ $company->employee ?? '-' }}</td>
                                    <td>
                                        @if($company->status_verification == '1')
                                        <span class="badge bg-success">Terverifikasi</span>
                                        @elseif($company->status_verification == '0')
                                        <span class="badge bg-danger">Belum Verifikasi</span>
                                        @else
                                        <span class="badge bg-warning">Menunggu</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-sm btn-primary" href="{{ route('company.show', $company->id) }}">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('company.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data perusahaan</td>
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