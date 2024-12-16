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
              <h5 class="card-title">List Perusahaan</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Avatar</th>
                    <th>Nama Perusahaan</th>
                    <th>Lokasi</th>
                    <th>Telepon</th>
                    <th>Bidang Perusahaan</th>
                    <th>Karyawan</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>-</td>
                    <td>Curicó</td>
                    <td>Jl.popopopp</td>
                    <td>098098098</td>
                    <td>pariwisata</td></td>
                    <td>67</td>
                    <td>false</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>-</td>
                    <td>Curicó</td>
                    <td>Jl.popopopp</td>
                    <td>098098098</td>
                    <td>pariwisata</td></td>
                    <td>67</td>
                    <td>false</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Menunggu Verifikasi</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>-</td>
                    <td>Curicó</td>
                    <td>Jl.popopopp</td>
                    <td>098098098</td>
                    <td>pariwisata</td></td>
                    <td>67</td>
                    <td>false</td>
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
