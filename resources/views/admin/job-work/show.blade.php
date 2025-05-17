@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job-work.index') }}">Pekerjaan</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pekerjaan</h5>

                    <div class="mb-3 text-end">
                        <a href="{{ route('job-work.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Informasi Umum</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Nama Pekerjaan:</span>
                                                    <span>{{ $jobWork->name }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Gaji:</span>
                                                    <span>Rp {{ number_format($jobWork->salary, 0, ',', '.') }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Lokasi:</span>
                                                    <span>{{ $jobWork->location }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Tanggal Mulai:</span>
                                                    <span>{{ date('d/m/Y', strtotime($jobWork->start_date)) }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Tanggal Berakhir:</span>
                                                    <span>{{ date('d/m/Y', strtotime($jobWork->end_date)) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Perusahaan:</span>
                                                    <span>{{ $jobWork->company->user->name ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Tipe Pekerjaan:</span>
                                                    <span>{{ $jobWork->workType->name ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Metode Pekerjaan:</span>
                                                    <span>{{ $jobWork->workMethod->name ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Bidang Pekerjaan:</span>
                                                    <span>{{ $jobWork->jobRole->name ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">Jurusan:</span>
                                                    <span>{{ $jobWork->qualification->major ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">IPK:</span>
                                                    <span>{{ $jobWork->qualification->ipk ?? '-' }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="fw-bold">TOEFL:</span>
                                                    <span>{{ $jobWork->qualification->toefl ?? '-' }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Deskripsi Pekerjaan</h5>
                                    <div class="text">
                                        {!! ($jobWork->description) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection