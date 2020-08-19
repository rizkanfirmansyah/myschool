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
          <div class="form-group col-md-4">
            <label for="guru">Guru</label>
              <select id="guru" name="guru" class="form-control">
                <option selected disabled value=""> ==Pilih Guru== </option>
                <?php foreach($guru as $j):?>
                  <option value="<?= $j['id'];?>"><?= $j['nama'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
          <div class="form-group col-md-4">
            <label for="mapel">Mapel</label>
              <select id="mapel" name="mapel" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih Mapel== </option>
                <?php foreach($mapel as $h):?>
                  <option class="text-capitalize" value="<?= $h['mapel_id'];?>"><?= $h['nama_mapel'] ?> *Kelas <?= $h['nama_jenjang']?></option>
                <?php endforeach;?>
              </select>
            </div>
          <div class="form-group col-md-4">
            <label for="hari">Hari</label>
              <select id="hari" name="hari" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih Hari== </option>
                <?php $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']; ?>
                <?php foreach($hari as $h):?>
                  <option class="text-capitalize" value="<?= $h;?>"><?= $h ?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="kelas" class="text-capitalize">kelas</label>
              <select id="kelas" name="kelas" class="form-control">
                <option selected disabled value=""> ==Pilih Kelas== </option>
                <?php foreach($kelas as $j):?>
                  <option value="<?= $j['kelas_id'];?>"><?= $j['nama_kelas'] ?></option>
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
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="masuk">Jam Masuk</label>
            <input type="time" name="masuk" id="waktuMasuk" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="Ruangan">Jam Keluar</label>
              <input type="time" name="keluar" id="waktuKeluar" required class="form-control">
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

