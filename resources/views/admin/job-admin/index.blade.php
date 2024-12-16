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
              <h5 class="card-title">Loker Admin</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Penerbit</th>
                    <th>Lokasi</th>
                    <th>Salary</th>
                    <th>Tipe Pekerjaan</th>
                    <th>Metode Pekerjaan</th>
                    <th>Bidang Pekerjaan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Curco</td>
                    <td>PT.Curicó</td>
                    <td>JL.popoppopp</td>
                    <td>5000.000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Curco</td>
                    <td>PT.Curicó</td>
                    <td>JL.popoppopp</td>
                    <td>5000.000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Curco</td>
                    <td>PT.Curicó</td>
                    <td>JL.popoppopp</td>
                    <td>5000.000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
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
