             <!-- Begin Page Content -->
             <div class="container-fluid mb-5">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                      <!-- FORM INPUT -->
                    <?= form_open_multipart('cbt/update/filesoal/'.$soal['id']) ?>
                      <div class="row mb-5">
                          <div class="col-md-12 col-lg-6">
                              <div class="form-group">
                                  <img src="<?= base_url('assets/data/soal/'.$soal['file_soal']) ?>" alt="<?= $soal['file_soal'] ?>" width="300">
                                  <?= input_function_soal($soal['file_soal']) ?> <br>
                                  <a class="text-danger"> <sup>*</sup> Hapus untuk mengganti gambar</a>
                                  <a href="<?= base_url('cbt/delete/filesoal/'.$soal['id']. '/'.$soal['file_soal']) ?>" class="btn btn-sm btn-danger mt-auto ml-auto"><i class="fas fa-trash"></i> Hapus</a>
                              </div>
                              <div class="form-group">
                                  <textarea name="soal" id="summernote" cols="30" rows="10"><?= $soal['soal'] ?></textarea>
                              </div>
                              <button type="submit" class="btn btn-sm btn-success mb-5"><i class="fas fa-save"></i> Simpan</button>
                          </div>
                      </div>
                      <?= form_close() ?>
 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->