<!-- Modal tambah materi -->
<div class="modal fade" id="kumpulkanTugas" tabindex="-1" role="dialog" aria-labelledby="kumpulkanTugasLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kumpulkanTugasLabel">Kumpulkan Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= form_open_multipart('input/kumpulkan') ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <!-- <label for="formGroupExampleInput2">Nama Tugas</label> -->
                    <select name="tugas" id="tugas" class="form-control" required> 
                        <option value="" selected disabled>== Pilih tugas ==</option>
                        <?php foreach($tugas as $m) : ?>
                            <option value="<?= $m['idtugas'] ?>"><?= $m['nama_tugas'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="filetugas" required>
                        <label class="custom-file-label" for="customFile">Upload Tugas</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">kumpulkan</button>
        </div>
    </form>
    </div>
  </div>
</div>
