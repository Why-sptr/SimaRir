<!-- Skill Modal -->
<div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillModalLabel">Tambah/Edit Skill</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-skill.update', 0) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="skills" class="form-label">Pilih Skill</label>
                        <select name="skills[]" id="skills" class="form-control" multiple="multiple">
                            @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{ in_array($skill->id, $user->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                            @endforeach
                        </select>
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