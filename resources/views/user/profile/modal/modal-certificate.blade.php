<!-- Modal Certificate -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="certificateModalLabel">Tambah/Edit Sertifikat</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="certificateForm" action="{{ route('certification.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formCertificateMethod" value="POST">
                    <input type="hidden" name="id" id="certificateId" value="">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Sertifikat</label>
                        <input type="text" class="form-control" id="nameCertificate" name="name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date_certificate" name="start_date" value="">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date_certificate" name="end_date" value="">
                    </div>
                    <div class="mb-3">
                        <label for="media" class="form-label">Upload Sertifikat</label>
                        <input type="file" class="form-control" id="media" name="media" accept=".jpg,.jpeg,.png,.pdf">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-sm delete-certificate" data-id=""
                            data-bs-toggle="modal" data-bs-target="#deleteCertificateModal">
                            Hapus
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>