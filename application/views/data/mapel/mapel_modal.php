
<!-- Modal: Guru -->
<div class="modal fade right" id="tambahDataRuangan" tabindex="-1" role="dialog" aria-labelledby="editDataKelas"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Data Ruangan
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/mapel') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="mapel" class="text-capitalize">Nama mapel</label>
            <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Masukkan Nama Mapel">
          </div>
          <div class="form-group col-md-6">
            <label for="jenjang" class="text-capitalize">Angkatan</label>
           <select name="jenjang" id="jenjang" class="form-control">
               <option value="" selected disabled>== Pilih Jenjang ==</option>
               <?php foreach($jenjang as $g):?>
                <option value="<?= $g['jenjang_id'] ?>">Kelas <?= $g['nama_jenjang'] ?></option>
               <?php endforeach;?>
           </select>
          </div>
        </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

      <!--Footer-->
  </div>
</div>
<!-- Modal: user -->

