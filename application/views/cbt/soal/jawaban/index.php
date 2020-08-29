             <!-- Begin Page Content -->
             <div class="container-fluid mb-5">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <sup><i class="fas fa-check"></i> Jawaban</sup></h1>

                      <!-- FORM INPUT -->
                      <?= form_open_multipart('cbt/input/jawaban/') ?>

                      <div class="row">
                          <div class="col-md-12 col-lg-4 col-sm-12">
                              <div class="card text-white bg-info mb-3">
                                  <div class="card-header bg-info">Ujian</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $detail['nama_ujian'] ?></h5>
                                        <p class="card-text"><?= $detail['deskripsi_ujian'] ?></p>
                                    </div>
                                </div>
                                <div class="card text-white bg-secondary mb-3">
                                    <div class="card-header bg-secondary">Soal</div>
                                    <div class="card-body">
                                        <h5 class="card-title">ID Ujian <?= $detail['id_ujian'] ?></h5>
                                        <p class="card-text"><?= $detail['soal'] ?></p>
                                </div>
                            </div>
                        </div>
                          <div class="col-md-12 col-lg-8 col-sm-12">
                              <input type="hidden" name="id_soal" id="id_soal" value="<?= $detail['idsoal']?>">
                            <?php  $char = range('A', 'E');foreach ($char as $abjad):?>    
                                  <label for="file"> JAWABAN <?= $abjad; ?></label><br>
                            <div class="form-group">
                                <textarea class="form-control" id="Jawaban<?= $abjad; ?>" name="jawaban<?= $abjad; ?>" placeholder="Isi Jawaban disini" required minlength="1"><?= $jawaban['jawaban'.$abjad] ?></textarea>
                            </div> 
                            <?php endforeach;?>
                            
                            <br>
                            <div class="form-group">
                                <label for="bobot_jawaban">Bobot soal</label>
                                <input type="number" name="bobot_nilai" id="bobot_nilai" class="form-control" required min="1" max="100" value="<?= $jawaban['bobot_nilai'] ?>">
                            </div>
                            <div class="form-group mb-5">
                                <label for="bobot_jawaban">Pilih Jawaban</label>
                                <select name="jawaban" id="jawaban" class="form-control" required>
                                    <?php if($jawaban['jawaban']) : ?>
                                        <option value="<?= $jawaban['jawaban'] ?>" selected><?= $jawaban['jawaban'] ?></option>
                                    <?php else: ?>
                                        <option value="" selected disabled> == Pilih Jawaban ==</option>
                                        <?php endif; ?>
                                    <?php  $char = range('A', 'E');foreach ($char as $abjad):?>    
                                        <option value="<?= $abjad ?>"><?= $abjad ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan Jawaban</button>
                        </div>

                        
                          
                          <?= form_close(); ?>
                          <!-- TUTUP FORM -->

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->