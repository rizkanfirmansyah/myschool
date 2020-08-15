
<!-- Modal: siswa -->
<div class="modal fade right" id="siswa-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    <?= form_open_multipart('import/siswa');?>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="far fa-file-alt fa-4x mb-3 animated rotateIn text-primary"></i>
          <p>Belum punya template? download disini
            <strong><a href="<?= base_url('download/excel/siswa') ?>">Template File</a></strong>
          </p>
        </div>

        <hr>
        <!--Basic textarea-->
        <div class="custom-file">
             <input type="file" class="custom-file-input" id="customFile" name="fileSiswa" id="fileSiswa">
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
<!-- Modal: siswa -->



<!-- Modal: siswa -->
<div class="modal fade right" id="inputDataSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Siswa
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
        
   <?= form_open_multipart('input/siswa');?>
      <!--Body-->
      <div class="modal-body">

        <!-- FORM INPUT -->
        <form>
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
              <label for="nisnsiswa">NISN</label>
              <input type="text" class="form-control" id="nisnsiswa" name="nisnsiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="agamasiswa">Agama</label>
              <input type="text" class="form-control" id="agamasiswa" name="agamasiswa">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ttlsiswa">Tanggal Lahir</label>
              <input type="date" class="form-control" id="ttlsiswa" name="ttlsiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="tempatlahir">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="kelassiswa">Kelas</label>
            <select class="custom-select" name="kelassiswa" id="kelassiswa">
              <option selected disabled value> == Pilih Kelas ==</option>
              <?php foreach($allkelas as $k):?>
              <option value="<?= $k['kelas_id'] ?>"><?= $k['nama_kelas'];?></option>
              <?php endforeach;?>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="angkatansiswa">Angkatan</label>
              <select class="custom-select" name="angkatansiswa" id="angkatansiswa">
                <option selected disabled value> == Pilih Angkatan == </option>
                <?php foreach($allangkatan as $a) :?>
                  <option value="<?= $a['angkatan_id'] ?>"><?= $a['angkatan_nama'] ?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="alamatsiswa">Alamat</label>
              <input type="text" class="form-control" id="alamatsiswa" name="alamatsiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="sekolahsiswa">Asal Sekolah</label>
              <input type="text" class="form-control" id="sekolahsiswa" name="sekolahsiswa">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ayahsiswa">Nama Ayah</label>
              <input type="text" class="form-control" id="ayahsiswa" name="ayahsiswa">
            </div>
            <div class="form-group col-md-6">
              <label for="ibusiswa">Nama Ibu</label>
              <input type="text" class="form-control" id="ibusiswa" name="ibusiswa">
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-right my-3"><i class="fas fa-send"></i> Daftar</button>
        </form>
        <!-- FORM INPUT -->

      </div>

    </div>
  </div>
</div>
<!-- Modal: siswa -->



