             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                 <form action="<?= base_url('edit/dataguru/'.$idguru) ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $guru['alamat'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="ttl">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $guru['tanggal_lahir'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="<?= $guru['agama'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="taa">Tahun Ajar Awal</label>
                                <input type="text" class="form-control" id="taa" name="taa" value="<?= $guru['tahun_ajar_awal'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="lulusan">Lulusan</label>
                                <input type="text" class="form-control" id="lulusan" name="lulusan" value="<?= $guru['lulusan'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status" id="status">
                                    <option selected id="status" value="<?= $guru['status'] ?>" class="text-uppercase"><?= $guru['status'] ?></option>
                                    <?php if($guru['status'] == 'pns'): ?>
                                        <option value="honorer" class="text-capitalize">honorer</option>
                                    <?php else: ?>
                                        <option value="pns" class="text-uppercase">pns</option>
                                    <?php endif; ?>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="sertifikasi" class="text-capitalize">sertifikasi</label>
                                <select class="custom-select" name="sertifikasi" id="sertifikasi">
                                    <option selected id="sertifikasi" value="<?= $guru['sertifikasi'] ?>" class="text-capitalize"><?= $guru['sertifikasi'] ?></option>
                                    <?php if($guru['sertifikasi'] == 'ya'): ?>
                                        <option value="tidak" class="text-capitalize">tidak</option>
                                    <?php else: ?>
                                        <option value="ya" class="text-capitalize">ya</option>
                                    <?php endif; ?>
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right my-3"><i class="fas fa-send"></i> Simpan</button>
                            </form>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->