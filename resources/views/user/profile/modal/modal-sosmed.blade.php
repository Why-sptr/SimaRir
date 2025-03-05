<!-- Sosmed Modal -->
<div class="modal fade" id="socialMediaModal" tabindex="-1" aria-labelledby="socialMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="socialMediaModalLabel">Tambah/Edit Sosial Media</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('social-media.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $user->socialMedia->instagram ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="github" class="form-label">GitHub</label>
                        <input type="text" class="form-control" id="github" name="github" value="{{ old('github', $user->socialMedia->github ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $user->socialMedia->youtube ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $user->socialMedia->website ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $user->socialMedia->linkedin ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tiktok" class="form-label">TikTok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $user->socialMedia->tiktok ?? '') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>