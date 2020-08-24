
<!-- Modal: Guru -->
<div class="modal fade right" id="tambahJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Jurusan
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
            <form id="formInputJurusan" action="<?= base_url('input/jurusan') ?>" method="post">
                <div class="form-group">
                    <label for="namaJurusan">Nama Jurusan</label>
                    <input type="text" class="form-control" id="namaJurusan" name="namaJurusan" placeholder="isi nama jurusan baru">
                </div>
                <div class="form-group">
                    <label for="payloadJurusan">Daya Tampung Jurusan</label>
                    <input type="number" class="form-control" id="payloadJurusan" placeholder="Masukan daya tampung jurusan" name="payloadJurusan">
                </div>
                <button type="submit" id="simpanDataJurusan" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan Jurusan</button>
            </form>
        </div>
        
      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->


<!-- Modal: Guru -->
<div class="modal fade right" id="editJurusanData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Tambah Jurusan
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
            <form id="formEditJurusan" action="<?= base_url('input/editjurusan') ?>" method="post">
                <div class="form-group">
                    <label for="jurusanNama">Nama Jurusan</label>
                    <input type="text" class="form-control" id="jurusanNama" name="jurusanNama" placeholder="isi nama jurusan baru">
                    <input type="hidden" class="form-control" id="jurusanID" name="jurusanID" placeholder="isi nama jurusan baru">
                </div>
                <div class="form-group">
                    <label for="jurusanPayload">Daya Tampung Jurusan</label>
                    <input type="number" class="form-control" id="jurusanPayload" placeholder="Masukan daya tampung jurusan" name="jurusanPayload">
                </div>
                <button type="submit" id="simpanJurusanData" value="<?= current_url() ?>" data-url="<?= current_url() ?>" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan Jurusan</button>
            </form>
        </div>
        
      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->


<!-- Modal: Guru -->
<div class="modal fade right" id="setPayload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Set Payload
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
            <form id="formInputPayload" action="<?= base_url('input/payload') ?>" method="post">
                <div class="form-group">
                    <label for="namaPayload">Daya tampung</label>
                    <input type="number" class="form-control" id="namaPayload" name="namapayload" value="<?= $totalpayload['payload'] ?>">
                </div>
                <button type="submit" id="simpanDataPayload" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
        
      <!--Footer-->
    </div>
  </div>
</div>
<!-- Modal: user -->
