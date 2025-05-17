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
          <h5 class="card-title">Metode Pekerjaan</h5>
          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#methodeModal" onclick="clearForm()">
            Add Work method
          </button>
          <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($workmethods as $methode)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $methode->name }}</td>
                  <td>
                    <form id="medthodeForm{{ $methode->id }}" action="{{ url('admin/work-method/'.$methode->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#methodeModal" data-id="{{ $methode->id }}" data-name="{{ $methode->name }}">
                        Edit
                      </button>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pendidikan ini?')">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Add and Delete -->
  <div class="modal fade" id="methodeModal" tabindex="-1" aria-labelledby="methodeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="methodeModalLabel">Tambah methode Pekerjaan</h5>
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="methodeForm" method="POST" action="{{ url('admin/work-method') }}">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nama methode</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script>
    const methodeModal = document.getElementById('methodeModal');
    methodeModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var name = button.getAttribute('data-name');

        var form = methodeModal.querySelector('form');
        var modalTitle = methodeModal.querySelector('.modal-title');

        if (id) {
            modalTitle.innerText = 'Edit methode Pekerjaan';
            form.action = '/admin/work-method/' + id;
            form.method = 'POST';

            var inputMethod = document.createElement('input');
            inputMethod.setAttribute('name', '_method');
            inputMethod.setAttribute('type', 'hidden');
            inputMethod.setAttribute('value', 'PUT');
            form.appendChild(inputMethod);

            form.querySelector('#name').value = name;
        } else {
            modalTitle.innerText = 'Tambah methode Pekerjaan';
            form.action = '/admin/work-method';
            form.method = 'POST';
            form.querySelector('#name').value = '';
        }
    });
</script>
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
@endpush