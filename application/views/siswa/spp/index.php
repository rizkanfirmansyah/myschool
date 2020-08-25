             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                      <!-- FORM INPUT -->

                      <!-- Content Row -->
                <div class="row">
                   <?php foreach($bulan as $b ) : ?>
                        <!-- Earnings Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-<?= cek_spp_warna($b['kecil']) ?> shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-<?= cek_spp_warna($b['kecil']) ?> text-uppercase mb-1"><?= $b['besar'] ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= cek_spp_siswa($b['kecil']) ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-<?= cek_spp_logo($b['kecil']) ?> fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

              </div>


 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->