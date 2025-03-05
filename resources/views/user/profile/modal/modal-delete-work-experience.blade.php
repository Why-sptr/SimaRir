 <!-- Delete Modal Work Experience -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="deleteModalLabel">Hapus Pengalaman Kerja</h5>
                 <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>Yakin ingin menghapus pengalaman kerja ini?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                 <form id="deleteForm" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                 </form>
             </div>
         </div>
     </div>
 </div>