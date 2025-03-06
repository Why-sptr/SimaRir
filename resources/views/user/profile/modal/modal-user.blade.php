<style>
    #location-suggestions {
        width: 93%;
        max-width: 93%;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
<!-- Modal User -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to edit the user's details -->
                <form action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Location Field -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ auth()->user()->location }}" placeholder="Ketik nama kabupaten/kota...">
                        <div id="location-suggestions" class="list-group position-absolute w-100" style="max-height: 200px; overflow-y: auto; display: none;"></div>
                    </div>

                    <!-- Corporate Field -->
                    <div class="mb-3">
                        <label for="education" class="form-label">Pendidikan</label>
                        <select class="form-control" id="education" name="education">
                            <option value="" disabled selected>Pilih Pendidikan</option>
                            @foreach ($educations as $edu)
                            <option value="{{ $edu->id }}"
                                {{ $edu->id == $user->education_id ? 'selected' : '' }}>
                                {{ $edu->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Job Role -->
                    <div class="mb-3">
                        <label for="job_role_id" class="form-label">Role</label>
                        <select class="form-control" id="job_role_id" name="job_role_id">
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach ($jobRoles as $job)
                            <option value="{{ $job->id }}" {{ $job->id == $user->job_role_id ? 'selected' : '' }}>
                                {{ $job->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Moto Field -->
                    <div class="mb-3">
                        <label for="moto" class="form-label">Moto</label>
                        <input type="text" class="form-control" id="moto" name="moto" value="{{ auth()->user()->moto }}">
                    </div>

                    <!-- Work Experience -->
                    <div class="mb-3">
                        <label for="work_experience" class="form-label">Pengalaman Kerja</label>
                        <input type="number" class="form-control" id="work_experience" name="work_experience" value="{{ auth()->user()->work_experience }}">
                    </div>

                    <!-- Gender Field -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">-- Pilih --</option>
                            <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                            <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <!-- Avatar Field -->
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
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