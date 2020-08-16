<!-- Modal: Guru -->
<div class="modal fade right" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Data Kelas
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/kelas') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="namakelas">Nama Kelas</label>
            <input type="text" class="form-control" id="namakelas" name="namakelas" placeholder="12 tkj 2">
          </div>
          <div class="form-group col-md-6">
            <label for="Guru">Guru</label>
              <select id="Guru" name="guru" class="form-control">
                <option selected disabled value=""> ==Pilih Guru== </option>
                <?php foreach($guru as $j):?>
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
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->

<!-- Modal: Guru -->
<div class="modal fade right" id="kelasEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Data Kelas
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/kelas') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="namakelas">Nama Kelas</label>
            <input type="text" class="form-control" id="namakelas" name="namakelas" placeholder="12 tkj 2">
          </div>
          <div class="form-group col-md-6">
            <label for="Guru">Guru</label>
              <select id="Guru" name="guru" class="form-control">
                <option selected disabled value=""> ==Pilih Guru== </option>
                <?php foreach($guru as $j):?>
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
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->
