
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
            <label for="guru" class="text-capitalize">guru</label>
           <select name="guru" id="guru" class="form-control">
               <option value="" selected disabled>== Pilih Guru ==</option>
               <?php foreach($guru as $g):?>
                <option value="<?= $g['id'] ?>"><?= $g['nama'] ?></option>
               <?php endforeach;?>
           </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
          <label for="angkatan" class="text-capitalize">angkatan</label>
           <select name="angkatan" id="angkatan" class="form-control">
               <option value="" selected disabled>== Pilih angkatan siswa ==</option>
               <?php foreach($angkatan as $g):?>
                <option value="<?= $g['angkatan_id'] ?>"><?= $g['angkatan_nama'] ?></option>
               <?php endforeach;?>
           </select>
            </div>
            <div class="form-group col-md-6">
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

