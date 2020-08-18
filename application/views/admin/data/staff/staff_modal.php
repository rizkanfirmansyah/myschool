<!-- Modal: kesiswaan -->
<div class="modal fade right" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Jabatan
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('input/jabatan');?>

      <!--Body-->
      <div class="modal-body">
          <div class="form-row">
              <label for="jabatan">Nama Jabatan</label>
              <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan nama jabatan baru" required autofocus autocomplete >
          </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Tambah</button>
        </div>

    <?= form_close(); ?>
    </div>
  </div>
</div>
<!-- Modal: sarana -->


<!-- Modal: tambah staff -->
<div class="modal fade right" id="tambahStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Staff
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    
        <form action="<?= base_url('input/staff')?>" method="post" class="formStaffJabatan">
      <!--Body-->
      <div class="modal-body">
          <div class="form-row">
              <div class="col">
                  <select name="posisiStaffJabatan" id="posisiStaffJabatan" class="form-control" required>
                      <option selected disabled value="">Pilih Posisi</option>
                      <?php foreach($staffbag as $sb):?>
                        <option value="<?= $sb['id_jabatan'];?>"><?= $sb['nama_jabatan'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <select name="posisiGuruJabatan" id="posisiGuruJabatan" class="form-control" required>
                        <option selected disabled value="">Pilih Guru</option>
                        <?php foreach($guru as $sb):?>
                            <option value="<?= $sb['id'];?>"><?= $sb['nama'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <input type="hidden" name="url" id="urlInputStaff" value="<?= current_url() ?>">
          </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-sm btn-success tambahInputDataStaff">Tambah</button>
    </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal: tambah staff -->

<!-- Modal: tambah staff -->
<div class="modal fade right" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Edit Staff
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    
        <form action="<?= base_url('edit/staff')?>" method="post" class="formEditStaffJabatan">
      <!--Body-->
      <div class="modal-body">
          <div class="form-row">
              <div class="col">
                  <select name="posisiJabatanStaff" id="posisiJabatanSTaff" class="form-control posisiJabatanStaff" required>
                      <option selected disabled class="posisiStaff"> </option>
                      <?php foreach($staffbag as $sb):?>
                        <option value="<?= $sb['id_jabatan'];?>"><?= $sb['nama_jabatan'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <select disabled name="posisiJabatanGuru" id="posisiJabatanGuru" class="form-control" required>
                        <option selected disabled class="pilihStaffGuru"> </option>
                    </div>
                    <input type="hidden" name="url" id="urlEditInputStaff" value="<?= current_url() ?>">
          </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-sm btn-success editInputDataStaff">Simpan</button>
    </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal: edit staff -->