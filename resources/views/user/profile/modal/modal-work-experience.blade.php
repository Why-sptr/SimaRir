<!-- Modal Work Experience -->
<div class="modal fade" id="workExperienceModal" tabindex="-1" aria-labelledby="workExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workExperienceModalLabel">Tambah/Edit Pengalaman Kerja</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="workExperienceForm" action="{{ route('work-experience.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="id" id="experienceId" value="">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="jobdesk" class="form-label">Jobdesk</label>
                        <input type="text" class="form-control" id="jobdesk" name="jobdesk" value="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div id="quill-editor" class="mb-3"></div>
                        <textarea rows="3" class="mb-3 d-none" name="description" id="quill-editor-area"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-outline-danger btn-sm delete-experience"
                            data-id=""
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            Hapus
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>