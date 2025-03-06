 <!-- Modal Attachment -->
 <div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="attachmentModalLabel">Edit Profile</h5>
                 <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('POST')
                     <div class="mb-3">
                         <label for="cv" class="form-label">CV</label>
                         <input class="form-control" type="file" id="cv" name="cv" value="{{ old('cv', $user->attachment->cv ?? '-') }}" onchange="previewFile('cv')">
                         <p id="cv-preview" class="mt-2">File: {{ $user->attachment->cv ?? '-' }}</p>
                     </div>
                     <div class="mb-3">
                         <label for="portfolio" class="form-label">Portfolio</label>
                         <input class="form-control" type="file" id="portfolio" name="portfolio" value="{{ old('portfolio', $user->attachment->portfolio ?? '-') }}" onchange="previewFile('portfolio')">
                         <p id="portfolio-preview" class="mt-2">File: {{ $user->attachment->portfolio ?? '-' }}</p>
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