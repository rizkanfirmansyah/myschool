             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                      <!-- FORM INPUT -->

                      <div class="row">
                          <div class="col-md-12 col-lg-6 col-sm-12">
                              <form action="<?= base_url('tu/nominal/'.$this->uri->segment(3)) ?>" method="POST">
                                  <div class="form-group">
                                      <div class="col">
                                          <label for="">NIS Siswa</label>
                                          <input class="form-control" value="<?= $this->uri->segment(4); ?>" type="text" name="disabled" id="disabled" disabled>
                                          <input class="form-control" value="<?= $this->uri->segment(4); ?>" type="hidden" name="nis" id="nis">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col">
                                            <label for="">Bayar <span class="text-uppercase"><?= $this->uri->segment(3) ?></span></label>
                                            <input class="form-control" type="number" name="nominal" id="nominal" autofocus required min="10000" max="25000000">
                                        </div>
                                    </div>
                                    <?php if($this->uri->segment(3) == 'spp') :?>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="">Bulan <span class="text-uppercase"><?= $this->uri->segment(3) ?></span></label>
                                                <select name="bulan" id="bulan" class="form-control">
                                                    <option value="" selected disabled>== Pilih Bulan ==</option>
                                                    <?php foreach($bulan as $b) : ?>
                                                        <option value="<?= $b['kecil'] ?>"><?= $b['besar'] ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif;?>

                                    <button type="submit" value="<?= $this->uri->segment(3) ?>" class="btn btn-primary ml-2">Simpan</button>
                              </form>
                          </div>
                      </div>
 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->