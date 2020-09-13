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
<div class="modal fade" id="uploadTugas" tabindex="-1" role="dialog" aria-labelledby="uploadTugasLabel" aria-hidden="true">
    <?= form_open_multipart('upload/file/tugas') ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadTugasLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="fileid" id="idTugas">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="filetugas">
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
<div class="modal fade" id="beriNilaiSiswa" tabindex="-1" role="dialog" aria-labelledby="beriNilaiSiswaLabel" aria-hidden="true">
  <?php $url= $this->uri->segment(4); ?>
    <?= form_open_multipart('upload/nilai/tugas/'.$url) ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="beriNilaiSiswaNama"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="idnilai" id="idNilai">
          <input type="number" min="1" required autofocus max="100" name="nilai" id="nilai" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Beri nilai</button>
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
          <button type="submit" name="action" value="hapus" class="btn ml-2 btn-sm btn-danger float-right"><i class="fas fa-trash"></i> Hapus</button> 
        </form>
        <button id="EditDataMateri" value="edit" class="btn btn-sm btn-warning float-right"><i class="fas fa-edit"></i> Edit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditDetailMateri" tabindex="-1" role="dialog" aria-labelledby="detailMateriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card" >
        <div class="card-body">
          <h5>Edit Data</h5>
          <span class="card-link"><small id="dataMateriTanggal"></small></span>
          <form action="<?= base_url('materi/aksi')?>" >
          <input type="text" class="form-control" name="deskripsi" id="EditMapelMateriData"><br>
          <input type="text" class="form-control" name="nama_materi" id="EditSubMateriData">
          <input type="hidden" name="id" id="editIdDataMateri"><br>
          <button type="submit" name="action" value="simpanMateri" class="btn ml-2 btn-sm btn-success float-right"><i class="fas fa-save"></i> Simpan</button> 
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailTugas" tabindex="-1" role="dialog" aria-labelledby="detailTugasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card" >
        <div class="card-body">
          <h3 class="card-title text-uppercase" id="mapelTugasData"></h3>
          <h6 class="card-subtitle mb-2 text-muted" id="subTugasData"></h6>
          <p class="card-text" id="deskripsiTugasData"></p>
          <span class="card-link"><small id="dataTugasTanggal"></small></span>
          <form action="<?= base_url('materi/aksi')?>">
          <input type="hidden" name="id" id="idDataTugas">
          <button type="submit" name="action" value="hapustugas" class="btn ml-2 btn-sm btn-danger float-right"><i class="fas fa-trash"></i> Hapus</button>
        </form>
        <button id="EditDataTugas" value="edit" class="btn btn-sm btn-warning float-right"><i class="fas fa-edit"></i> Edit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editDetailTugas" tabindex="-1" role="dialog" aria-labelledby="detailTugasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card" >
          <div class="card-body">
            <h5>Edit Data</h5>
          <form action="<?= base_url('materi/aksi')?>" >
          <input type="text" class="form-control" name="deskripsi" id="EditMapelTugasData"><br>
          <input type="text" class="form-control" name="nama_tugas" id="EditSubTugasData">
          <input type="hidden" name="id" id="editIdDataTugas"><br>
          <button type="submit" name="action" value="simpanTugas" class="btn ml-2 btn-sm btn-success float-right"><i class="fas fa-save"></i> Simpan</button> 
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

<!-- Modal tambah tugas -->
<div class="modal fade" id="tambahTugas" tabindex="-1" role="dialog" aria-labelledby="tambahTugasLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahTugasLabel">Tambah Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('input/tugas') ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="KDtugas">KD</label>
                    <input type="number" class="form-control" name="kdtugas" id="KDtugas" placeholder="1,2, ...">
                </div>
                <div class="form-group col-md-3">
                    <label for="KDtugas">Kelas</label>
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
                    <label for="tugas">Nama tugas</label>
                    <input type="text" class="form-control" name="tugas" id="tugas" placeholder="Masukkan judul tugas">
                </div>
                <div class="form-group col-md-6">
                    <label for="deskripsi">Deskripsi tugas</label>
                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" placeholder="Masukkan deskripsi tugas"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date">Deadline tugas</label>
                    <input type="date" class="form-control" name="date" id="date" placeholder="Masukkan judul tugas">
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