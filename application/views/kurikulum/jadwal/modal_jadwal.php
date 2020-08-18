<!-- Modal: Jadwal -->
<div class="modal    fade right" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog  modal-lg modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content ">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Data Jadwal
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/jadwal') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="namaJadwal">Nama Jadwal</label>
            <input type="text" class="form-control" id="namaJadwal" name="namaJadwal" placeholder="12 tkj 2">
          </div>
          <div class="form-group col-md-6">
            <label for="Jadwal">Jadwal</label>
              <select id="Jadwal" name="Jadwal" class="form-control">
                <option selected disabled value=""> ==Pilih Jadwal== </option>
                <?php foreach($Jadwal as $j):?>
                  <option value="<?= $j['id'];?>"><?= $j['nama'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Jurusan">Jurusan</label>
              <select id="Jurusan" name="jurusan" class="form-control">
                <option selected disabled value=""> ==Pilih Jurusan== </option>
                <?php foreach($jurusan as $j):?>
                  <option value="<?= $j['jurusan_id'];?>"><?= $j['nama_jurusan'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="Ruangan">Ruangan</label>
              <select id="Ruangan" name="ruangan" class="form-control">
                <option selected disabled value=""> ==Pilih Ruangan== </option>
                <?php foreach($ruangan as $j):?>
                  <option value="<?= $j['ruangan_id'];?>"><?= $j['nama_ruangan'] ?></option>
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
