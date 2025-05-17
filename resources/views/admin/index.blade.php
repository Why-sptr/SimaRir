<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Total User Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">User <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalUsers }}</h6>
                                    <span class="text-success small pt-1 fw-bold">{{ $userPercentageChange }}%</span> 
                                    <span class="text-muted small pt-2 ps-1">
                                        {{ $userPercentageChange >= 0 ? 'kenaikan' : 'penurunan' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Total User Card -->

                <!-- Total Company Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Company <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalCompanies }}</h6>
                                    <span class="text-success small pt-1 fw-bold">{{ $companyPercentageChange }}%</span> 
                                    <span class="text-muted small pt-2 ps-1">
                                        {{ $companyPercentageChange >= 0 ? 'kenaikan' : 'penurunan' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Total Company Card -->

                <!-- Total Loker Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Loker <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalJobWorks }}</h6>
                                    <span class="{{ $jobWorkPercentageChange >= 0 ? 'text-success' : 'text-danger' }} small pt-1 fw-bold">{{ $jobWorkPercentageChange }}%</span> 
                                    <span class="text-muted small pt-2 ps-1">
                                        {{ $jobWorkPercentageChange >= 0 ? 'kenaikan' : 'penurunan' }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Total Loker Card -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Laporan <span>/Bulan</span></h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'User',
                                            data: {!! json_encode($monthlyUserData) !!},
                                        }, {
                                            name: 'Company',
                                            data: {!! json_encode($monthlyCompanyData) !!}
                                        }, {
                                            name: 'Loker',
                                            data: {!! json_encode($monthlyJobWorkData) !!}
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: {!! json_encode($chartMonths) !!}
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Recent Loker -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Loker Terbaru <span></span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">Gaji</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentJobWorks as $index => $job)
                                    <tr>
                                        <th scope="row"><a href="#">#</a></th>
                                        <td>{{ $job->company->user->name }}</td>
                                        <td><a href="#" class="text-primary">{{ $job->name }}</a></td>
                                        <td>Rp {{ number_format($job->salary, 0, ',', '.') }}</td>

                                        <td>
                                            @php
                                                $today = \Carbon\Carbon::now();
                                                $startDate = \Carbon\Carbon::parse($job->start_date);
                                                $endDate = \Carbon\Carbon::parse($job->end_date);
                                                
                                                if ($today->lt($startDate)) {
                                                    $statusClass = 'bg-warning';
                                                    $status = 'Segera Dibuka';
                                                } elseif ($today->gt($endDate)) {
                                                    $statusClass = 'bg-danger';
                                                    $status = 'Ditutup';
                                                } else {
                                                    $statusClass = 'bg-success';
                                                    $status = 'Dibuka';
                                                }
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ $status }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Loker -->

                <!-- Loker dengan Pelamar Terbanyak -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Loker dengan Pelamar Terbanyak <span></span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Nama Pekerjaan</th>
                                        <th scope="col">Gaji</th>
                                        <th scope="col">Jumlah Pelamar</th>
                                        <th scope="col">Tanggal Tutup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topJobWorks as $job)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">
                                                @if($job->company->user->avatar)
                                                    <img src="{{ asset('storage/avatars/'.$job->company->user->avatar) }}" class="border border-1 border-primary" alt="{{ $job->company->user->name }}">
                                                @else
                                                    <img src="{{ asset('assets/img/default-user.png') }}" alt="{{ $job->company->user->name }}">
                                                @endif
                                            </a>
                                        </th>
                                        <td><a href="#" class="text-primary fw-bold">{{ $job->name }}</a></td>
                                        <td>Rp {{ number_format($job->salary, 0, ',', '.') }}</td>
                                        <td class="fw-bold">{{ $job->candidates_count }}</td>
                                        <td>{{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Loker dengan Pelamar Terbanyak -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>
@endsection