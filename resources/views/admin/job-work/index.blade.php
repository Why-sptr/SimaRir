@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Pekerjaan</h5>

          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="table-responsive">
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
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jobWorks as $index => $job)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $job->name }}</td>
                  <td>{{ $job->company->user->name ?? '-' }}</td>
                  <td>{{ $job->location }}</td>
                  <td>{{ number_format($job->salary, 0, ',', '.') }}</td>
                  <td>{{ $job->jobRole->name ?? '-' }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="{{ route('job-work.show', $job->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i>
                      </a>
                      <form action="{{ route('job-work.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
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
    // Initialize datatable with options
    $('.datatable').DataTable({
      responsive: true,
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
      }
    });
  });
</script>
@endsection