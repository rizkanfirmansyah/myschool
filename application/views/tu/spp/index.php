             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
                    <a href="#" data-toggle="modal" data-target="#setSPP" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-table"></i> Set SPP</a>
                    </div>
                     
                     <!-- FORM INPUT -->

                <div class="row">
                    
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SPP</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"> Rp. <?= number_format($spp,2,',','.'); ?></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SPP Masuk</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($sppjml,2,',','.'); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sudah Bayar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswaspp; ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belum Bayar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswasppb; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ban fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
                    <!-- TABEL -->

                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data SPP Siswa</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nis</th>
                                    <th>Nominal</th>
                                    <th>Sisa SPP</th>
                                    <th>Bayar</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i=1; ?>
                            <?php foreach($siswa as $s) : ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $s['nama'] ?></td>
                                    <td><?= $s['nis'] ?></td>
                                    <td>Rp. <?= number_format($s['jml'],2,',','.')?></td>
                                    <td><?= get_spp_bulan($s['nis'])?> Bulan</td>
                                    <td><a href="<?= base_url('tu/bayar/spp/'.$s['nis']) ?>" class="btn btn-sm btn-success text-white"><i class="fas fa-dollar-sign"></i> Bayar</a></td>
                                </tr>
                                <?php $i++;?>
                            <?php endforeach;?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>

                    <!-- TABEL -->

 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

             <?php $this->load->view('tu/spp/modal_spp') ?>