             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DSP</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($dpp,2,',','.');?></div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SPP</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($spp,2,',','.');?></div>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SPP Dibayar</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Rp. 600.000,00</div>
                                </div>
                            </div>
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
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">DSP Dibayar</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($nominaldsp,2,',','.')?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>


                    <!-- TABEL -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data DSP Siswa</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Sisa DSP</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i=1; ?>
                            <?php foreach($jmldpp as $jdp) : ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $jdp['tanggal'] ?></td>
                                    <td>Rp. <?= number_format($jdp['nominal'],2,',','.')?></td>
                                    <td>Rp. <?= number_format(function_siswa_dpp($jdp['siswa_nis']),2,',','.')?></td>
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