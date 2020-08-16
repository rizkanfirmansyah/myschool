               <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

				 <!-- Content Row -->
				          <div class="row">


				            <!-- Earnings (Monthly) Card Example -->
				            <div class="col-xl-3 col-md-6 mb-4">
				              <div class="card border-left-primary shadow h-100 py-2" data-toggle="modal" data-target="#setting" >
				                <div class="card-body">
				                  <div class="row no-gutters align-items-center">
				                    <div class="col mr-2">
				                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Database soal</div>
				                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUjian; ?> Soal</div>
				                    </div>
				                    <div class="col-auto">
				                      <i class="fas fa-clipboard-list fa-2x text-primary"></i>
				                    </div>
				                  </div>
				                </div>
				              </div>
				            </div>

				            <?php 
				            	if ($presentase['jumlah_soal'] < 1) {
				            		$benar = 0;
				            		$soal = 1;
				            		$salah = 0;
				            	} else {
				            		$benar = $presentase['jumlah_benar'];
				            		$salah = $presentase['jumlah_salah'];
				            		$soal = $presentase['jumlah_soal'];
				            	}
				            	

				            	if ($presentase['jumlah_benar']>$presentase['jumlah_salah']) {
				            		$warna = 'success';
				            	} else {
				            		$warna = 'danger';
				            	}

				            		
				             ?>

				            <!-- Earnings (Monthly) Card Example -->
				            <div class="col-xl-6 col-md-6 mb-4">
				              <div class="card border-left-<?= $warna;?> shadow h-100 py-2">
				                <div class="card-body">
				                  <div class="row no-gutters align-items-center">
				                    <div class="col mr-2">
				                      <div class="text-xs font-weight-bold text-<?= $warna;?> text-uppercase mb-1">Presentase Nilai</div>
				                      <div class="row no-gutters align-items-center">
				                        <div class="col-auto">
				                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $benar*100/$soal; ?>%</div>
				                        </div>
				                        <div class="col">
				                          <div class="progress progress-sm mr-2">
								              <div class="progress-bar bg-success" role="progressbar" style="width: <?= $benar*100/$soal; ?>%" aria-valuenow="<?= $benar; ?>; ?>" aria-valuemin="0" aria-valuemax="<?= $soal; ?>"><?= $benar*100/$soal; ?>%</div>
								                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $salah*100/$soal; ?>%" aria-valuenow="<?= $salah; ?>" aria-valuemin="0" aria-valuemax="<?= $soal; ?>"><?= $salah*100/$soal; ?>%</div>
				                          </div>
				                        </div>
				                      </div>
				                    </div>
				                    <div class="col-auto">
				                      <i class="fas fa-clipboard-check fa-2x text-<?= $warna;?>"></i>
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
				                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sudah mengerjakan</div>
				                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $presentase['nama']; ?></div>
				                    </div>
				                    <div class="col-auto">
				                      <i class="fas fa-users fa-2x text-warning"></i>
				                    </div>
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>


				             <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Nilai</th>
                      <th>Jumlah Benar</th>
                      <th>Jumlah Salah</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Nama</th>
                      <th>Nilai</th>
                      <th>Jumlah Benar</th>
                      <th>Jumlah Salah</th>
                      <th>Tanggal</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach ($peserta as $p): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $p['nama']; ?></td>
                      <td><?= $p['nilai']; ?></td>
                      <td><?= $p['jumlah_benar']; ?></td>
                      <td><?= $p['jumlah_salah']; ?></td>
                      <td><?= date('d M Y', $p['time']) ?></td>
                    </tr>
                    <?php $i++; ?>
                  	<?php endforeach; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>



             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->



                 <!-- Modal -->
			<div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="settingLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="settingLabel"><i class="fas fa-database"></i> Database Soal </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			<div class="table-responsive">
                <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                       <th>Soal</th>
                       <th>Bab</th>
                       <th>Jumlah Soal</th>
                       <th>Tanggal</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                       <th>Soal</th>
                       <th>Bab</th>
                       <th>Jumlah Soal</th>
                       <th>Tanggal</th>
                       <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach ($soalujian as $s): ?>
                    <tr>
                      	<td><?= $i; ?></td>
                      	<td><?= $s['soal']; ?></td>
                      	<td><?= $s['bab']; ?></td>
                      	<td><?= $s['jmlsoal']; ?></td>
                      	<td><?= date('d-M-Y', $s['time']); ?></td>
                      	<td>
                      		<a href="<?= base_url('input/hasilujian/' . $s['id_soal']); ?>" class="btn btn-info"><i class="fas fa-search"></i> Detail</a>
                      	</td>
                    </tr>
                    <?php $i++; ?>
                  	<?php endforeach; ?>
                    
                  </tbody>
                </table>
              </div>  
			    </div>
			  </div>
			</div>
		</div>


