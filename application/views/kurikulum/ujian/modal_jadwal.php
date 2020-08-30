<!-- Modal: Jadwal -->
<div class="modal    fade right" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog  modal-lg modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content ">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Data Jadwal Ujian
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/jadwalujian') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="ujian">ujian</label>
              <select id="id_ujian" name="id_ujian" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih ujian== </option>
                <?php foreach($ujian as $h):?>
                  <option class="text-capitalize" value="<?= $h['id'];?>"><?= $h['nama_mapel'] ?> *Kelas <?= $h['nama_jenjang']?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="kelas">Kelas</label>
            <select id="id_kelas" name="id_kelas" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih kelas== </option>
                <?php foreach($kelas as $h):?>
                  <option class="text-capitalize" value="<?= $h['kelas_id'];?>"><?= $h['nama_kelas'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="Ruangan">Ruangan</label>
              <select id="id_ruangan" name="id_ruangan" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih ruangan== </option>
                <?php foreach($ruangan as $h):?>
                  <option class="text-capitalize" value="<?= $h['ruangan_id'];?>"><?= $h['nama_ruangan'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="mulai">Mulai</label>
            <input type="datetime-local" name="mulai" id="waktumulai" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="selesai">Selesai</label>
              <input type="datetime-local" name="selesai" id="waktuselesai" class="form-control">
            </div>
            <input type="hidden" name="status" value="1">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>

      <!--Footer-->
  </div>
</div>
<!-- Modal: user -->

