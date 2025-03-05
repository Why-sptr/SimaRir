<!-- Modal Organization Experience -->
<div class="modal fade" id="organizationExperienceModal" tabindex="-1" aria-labelledby="organizationExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="organizationExperienceModalLabel">Tambah/Edit Pengalaman Organisasi</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="organizationExperienceForm" action="{{ route('organizations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethodOrganizations" value="POST">
                    <input type="hidden" name="idOrganization" id="organizationId" value="">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Organisasi</label>
                        <input type="text" class="form-control" id="nameOrganizations" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="department" name="department">
                    </div>
                    <div class="mb-3">
                        <label for="descriptionOrganizations" class="form-label">Deskripsi</label>
                        <div id="quill-editor-organizations" class="mb-3"></div>
                        <textarea rows="3" class="d-none" name="description" id="quill-editor-area-organizations"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-sm" id="deleteOrganizationBtn" data-id="" style="display: none;">Hapus</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>