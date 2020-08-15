

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
<div class="modal fade right" id="setas-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Pengaturan Guru
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <div class="row text-center">
            <a href="<?= base_url('action/make/password');?>" class="my-3 mx-auto px-5 btn btn-warning btm-sm"><i class="fas fa-fw fa-key"></i> Set Password</a>
            <a href="<?= base_url('action/make/active');?>" class="my-3 mx-auto px-5 btn btn-success btm-sm"><i class="fas fa-fw fa-check"></i> Jadikan Aktif</a>
            <a href="<?= base_url('action/make/inactive');?>" class="my-3 mx-auto px-4 btn btn-danger btm-sm"><i class="fas fa-fw fa-times"></i> Jadikan Tidak Aktif</a>
        </div>
        
        
        <hr>

      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->
