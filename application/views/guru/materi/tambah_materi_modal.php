<!-- Modal -->
<div class="modal fade" id="uploadMateri" tabindex="-1" role="dialog" aria-labelledby="uploadMateriLabel" aria-hidden="true">
    <?= form_open_multipart('upload/file/materi') ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadMateriLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="fileid" id="idMateri">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="filemateri">
        <label class="custom-file-label" for="customFile">Pilih File</label>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
  <?= form_close(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="detailMateri" tabindex="-1" role="dialog" aria-labelledby="detailMateriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card" >
        <div class="card-body">
          <h3 class="card-title text-uppercase" id="mapelMateriData"></h3>
          <h6 class="card-subtitle mb-2 text-muted" id="subMateriData"></h6>
          <p class="card-text" id="deskripsiMateriData"></p>
          <span class="card-link"><small id="dataMateriTanggal"></small></span>
          <form action="<?= base_url('materi/aksi')?>">
          <input type="hidden" name="id" id="idDataMateri">
          <button type="submit" name="action" value="hapus" class="btn btn-sm btn-danger float-right"><i class="fas fa-trash"></i> Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah materi -->
<div class="modal fade" id="tambahMateri" tabindex="-1" role="dialog" aria-labelledby="tambahMateriLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMateriLabel">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('input/materi') ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="KDMateri">KD</label>
                    <input type="number" class="form-control" name="kdmateri" id="KDMateri" placeholder="1,2, ...">
                </div>
                <div class="form-group col-md-3">
                    <label for="KDMateri">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="" selected disabled>== Pilih kelas ==</option>
                        <?php foreach($kelas as $k) : ?>
                            <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Mata Pelajaran</label>
                    <select name="mapel" id="mapel" class="form-control">
                        <option value="" selected disabled>== Pilih mapel ==</option>
                        <?php foreach($mapel as $m) : ?>
                            <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="materi">Nama Materi</label>
                    <input type="text" class="form-control" name="materi" id="materi" placeholder="Masukkan judul materi">
                </div>
                <div class="form-group col-md-6">
                    <label for="deskripsi">Deskripsi Materi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" placeholder="Masukkan deskripsi materi"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    </div>
  </div>
</div>