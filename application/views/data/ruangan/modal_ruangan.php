
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
        <form action="<?= base_url('input/ruangan') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ruangan">Nama Ruangan</label>
            <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Nama Ruangan">
          </div>
          <div class="form-group col-md-6">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Ruangan">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="payload">Daya Tampung</label>
            <input type="payload" class="form-control" id="payload" name="payload" placeholder="Masukkan Daya Tampung Ruangan">
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

