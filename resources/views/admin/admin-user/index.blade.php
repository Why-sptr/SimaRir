<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title')

@section('content')
<div class="pagetitle">
    <h1>{{$title}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">User</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Admin</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Avatar</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>email</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>-</td>
                                <td>Curicó</td>
                                <td>090909090</td>
                                <td>ccc@gmail.com</td>
                                <td>Laki-Laki</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>Curicó</td>
                                <td>090909090</td>
                                <td>ccc@gmail.com</td>
                                <td>Laki-Laki</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>Curicó</td>
                                <td>090909090</td>
                                <td>ccc@gmail.com</td>
                                <td>Laki-Laki</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection