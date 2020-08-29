             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <a href="<?= base_url('cbt/input/pagesoal/'.$this->uri->segment(5)) ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-out-alt fa-sm text-white-50"></i> Kembali</a>
                </div>

                      <!-- FORM INPUT -->
                      <?= form_open_multipart('cbt/upload/filejawaban/'.$this->uri->segment(4)) ?>
                      <div class="row">
                          <div class="col-lg-6 col-md-12">
                          <div class="form-group ">
                                <label for="bobot_jawaban">Pilih Jawaban</label>
                                <select name="jawaban" id="jawaban" class="form-control" required>
                                        <option value="" selected disabled> == Pilih Jawaban ==</option>
                                    <?php  $char = range('A', 'E');foreach ($char as $abjad):?>    
                                        <option value="<?= $abjad ?>"><?= $abjad ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save">  </i> Simpan</button>
                          </div>
                      </div>
                      <?= form_close() ?>
 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->