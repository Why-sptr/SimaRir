<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title')

@section('content')
    <div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Perusahaan</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Perusahaan yang Meminta Verifikasi</h5>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Nama Pemilik</th>
                                <th>Bidang Usaha</th>
                                <th>Karyawan</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PT. Makanan Enak</td>
                                <td>John Doe</td>
                                <td>Food and Beverage</td>
                                <td>20</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                            </tr>
                            <tr>
                                <td>PT. Sepatu Bagus</td>
                                <td>Jane Doe</td>
                                <td>Fashion</td>
                                <td>10</td>
                                <td><span class="badge rounded-pill bg-success">Terverifikasi</span></td>
                            </tr>
                            <tr>
                                <td>PT. Baju Online</td>
                                <td>Bob Smith</td>
                                <td>E-commerce</td>
                                <td>5</td>
                                <td><span class="badge rounded-pill bg-danger">Ditolak</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
