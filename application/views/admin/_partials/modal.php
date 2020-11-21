<!-- Naik Kelas Modal -->
<div class="modal fade" id="naikKelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Semua siswa akan naik kelas, dan kelas 6 akan menjadi kelas alumni.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('admin/siswa/setNaikKelas') ?>">Naik</a>
      </div>
    </div>
  </div>
</div>