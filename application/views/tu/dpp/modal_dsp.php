<!-- Modal tambah materi -->
<div class="modal fade" id="setDSP" tabindex="-1" role="dialog" aria-labelledby="setDSPLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="setDSPLabel">Tetapkan DSP Sekolah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= form_open_multipart('input/dsp') ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="number" name="dsp" id="dsp" max="25000000" required min="100000" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tetapkan</button>
        </div>
    </form>
    </div>
  </div>
</div>
