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
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pendidikan</h5>
          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#educationModal" onclick="clearForm()">
            Add Education
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
                @foreach($educations as $education)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $education->name }}</td>
                  <td>
                    <form id="educationForm{{ $education->id }}" action="{{ url('admin/education/'.$education->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#educationModal" data-id="{{ $education->id }}" data-name="{{ $education->name }}">
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
  <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="educationModalLabel">Tambah Pendidikan</h5>
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="educationForm" method="POST" action="{{ url('admin/education') }}">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Pendidikan</label>
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
    const educationModal = document.getElementById('educationModal');
    educationModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var name = button.getAttribute('data-name');

        var form = educationModal.querySelector('form');
        var modalTitle = educationModal.querySelector('.modal-title');

        if (id) {
            modalTitle.innerText = 'Edit Pendidikan';
            form.action = '/admin/education/' + id;
            form.method = 'POST';

            var inputMethod = document.createElement('input');
            inputMethod.setAttribute('name', '_method');
            inputMethod.setAttribute('type', 'hidden');
            inputMethod.setAttribute('value', 'PUT');
            form.appendChild(inputMethod);

            form.querySelector('#name').value = name;
        } else {
            modalTitle.innerText = 'Tambah Pendidikan';
            form.action = '/admin/education';
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

