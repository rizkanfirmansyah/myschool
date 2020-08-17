

<!-- Modal: modalPoll -->
<div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Upload File
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('import/guru');?>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="far fa-file-alt fa-4x mb-3 animated rotateIn text-primary"></i>
          <p>Belum punya template? download disini
            <strong><a href="<?= base_url('download/excel/guru') ?>">Template File</a></strong>
          </p>
        </div>

        <hr>
        <!--Basic textarea-->
        <div class="custom-file">
             <input type="file" class="custom-file-input" id="customFile" name="fileAdmin" id="fileAdmin">
             <label class="custom-file-label" for="customFile">Choose file</label>
        </div>


      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary text-white">Upload
          <i class="fa fa-upload ml-1"></i>
        </button>
        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal: modalPoll -->


<!-- Modal: Guru -->
<div class="modal fade right" id="tambah-guru-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Guru
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/guru')?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="emailsiswa">Email</label>
              <input type="email" class="form-control" id="emailsiswa" name="emailsiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="passwordsiswa">Password</label>
              <input type="password" class="form-control" id="passwordsiswa" name="passwordsiswa">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="namasiswa">Nama Lengkap</label>
              <input type="text" class="form-control" id="namasiswa" name="namasiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="nissiswa">NIS</label>
              <input type="number" class="form-control" id="nissiswa" name="nissiswa">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="telepon">Telepon</label>
              <input type="number" class="form-control" id="telepon" name="telepon">
            </div>
            <div class="form-group col-md-6">
              <label for="agama">Agama</label>
              <input type="text" class="form-control" id="agama" name="agama">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ttl">Tanggal Lahir</label>
              <input type="date" class="form-control" id="ttl" name="ttl">
            </div>
            <div class="form-group col-md-6">
              <label for="tempatlahir">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="sertifikasi">Sertifikasi</label>
            <select class="custom-select" name="sertifikasi" id="sertifikasi">
              <option selected disabled value> == Pilih ==</option>
              <option value="ya">ya</option>
              <option value="tidak">tidak</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="jurusan">Jurusan</label>
              <select class="custom-select" name="jurusan" id="jurusan">
                <option selected disabled value> == Pilih Jurusan == </option>
                <?php foreach($jurusan as $a) :?>
                  <option value="<?= $a['jurusan_id'] ?>"><?= $a['nama_jurusan'] ?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="form-group col-md-6">
              <label for="tahun_ajar">Tahun Ajar Awal</label>
              <input type="date" class="form-control" id="tahun_ajar" name="tahun_ajar">
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-right my-3"><i class="fas fa-send"></i> Daftar</button>
        </form>
        
        
        <hr>

      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->
