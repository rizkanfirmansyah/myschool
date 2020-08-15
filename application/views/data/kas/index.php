	
 <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
			

			<div class="container">
				<div class="col-md-6" style="margin-left: -20px;">
                 	<?= $this->session->flashdata('message'); ?>
				</div>	
            </div>

		<!-- DATA KAS -->
		<div class="row">
            <!-- Earnings (Monthly) Card Example -->
			<a style="text-decoration: none;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan Kas (Hari Ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kasLabaToday['nominal'],2,',','.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
       			 </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
			<a style="text-decoration: none;" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Kas (Hari Ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kasRugiToday['nominal'],2,',','.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
	      </a>
         </div>

            <!-- Earnings (Monthly) Card Example -->
            <a style="text-decoration: none;" data-toggle="collapse" href="#dataPemasukanKasPerBulan" role="button" aria-expanded="false" aria-controls="dataPemasukanKasPerBulan">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Laba </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kasLaba['nominal'],2,',','.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          	 </a>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <a style="text-decoration: none;" data-toggle="collapse" href="#dataPengeluaranPerBulan" role="button" aria-expanded="false" aria-controls="dataPengeluaranPerBulan">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Rugi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kasRugi['nominal'],2,',','.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
        </a>
            </div>


        </div>

        <p class="text-center">
		  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Data Kas</button>
		  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Tampilkan Semuanya</button>
		</p>


		<div class="row">
		 	<!-- DATA Pemasukan Kas -->
	
				<div class="col">
				    <div class="collapse multi-collapse" id="multiCollapseExample1">
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-6">
			                  <h6 class="m-0 mt-2 font-weight-bold text-success">Data Pemasukan Kas </h6>
			                </div>
			                     <div class="ml-auto mt-auto col-md-6">
									<?php if ($kasToday == NULL): ?>			                     		
			                     	<?php else: ?>
			                           <form action="<?= base_url('upload/kas/pemasukan'); ?>" method="post" style="margin-left: 10px;">
			                                <div class="row">
			                                    <select class="form-control col-md-4" id="user_id" name="user_id">
			                                        <option value="admin-1">Donasi</option>
													<?php foreach ($nama as $n): ?>
				                                        <option value="<?= $n['user_id']; ?>"><?= $n['name']; ?></option>
													<?php endforeach; ?>
			                                      </select>
			                                  <div class="input-group col-md-8">
			                                        <input type="text" id="nominal" name="nominal" placeholder="Masukkan Nominal Uang..." class="form-control" autocomplete="off" autofocus required>
			                                    <div class="input-group-append">
			                                          <button type="submit" class="btn btn-outline-success">Input</button>
			                                      </div>
			                                  </div>
			                                </div>
			                              </form>
			                     	<?php endif ?>
			                            </div>
			                                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="dataPemasukan" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Keterangan</th>
			                        <th scope="col">Nama</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tanggal</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </thead>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($kasPemasukan as $k): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $k['keterangan']; ?></td>
			                        	<td><?= $k['name']; ?></td>
			                        	<td><?= $k['nominal']; ?></td>
			                        	<td><?= date('d-M-Y',$k['waktu']); ?></td>
			                          <td>
			                            <a href="" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
			                            <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
			                          </td>
			                        </tr>
			                        <?php $i++; ?>
			                  	<?php endforeach; ?>
			                  </tbody>
			                  <tfoot>
			                    <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Keterangan</th>
			                        <th scope="col">Nama</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tanggal</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </tfoot>
			                </table>
			              </div>
			            </div>
			          </div>

				    </div>
				  </div>

		 	<!-- End DATA Pemasukan Kas -->
		</div>

		
		
		<div class="row">
		 	<!-- DATA Pemasukan Kas PER Bulan -->
	
				<div class="col">
				    <div class="collapse multi-collapse" id="dataPemasukanKasPerBulan">
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-6">
			                  <h6 class="m-0 mt-2 font-weight-bold text-success">Total Data Pemasukan</h6>
			                </div>
			                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="dataPemasukanPerBulan" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Bulan</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </thead>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($totalLaba as $tl): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $tl['nominal']; ?></td>
			                        	<td>
			                        		<?php if ($tl['bulan'] == 1) {$tgl = 'Januari';}
			                        		 elseif ($tl['bulan'] == 2) {$tgl = 'Februari';} 
			                        		 elseif ($tl['bulan'] == 3) {$tgl = 'Maret';} 
			                        		 elseif ($tl['bulan'] == 4) {$tgl = 'April';} 
			                        		 elseif ($tl['bulan'] == 5) {$tgl = 'Mei';} 
			                        		 elseif ($tl['bulan'] == 6) {$tgl = 'Juni';} 
			                        		 elseif ($tl['bulan'] == 7) {$tgl = 'Juli';} 
			                        		 elseif ($tl['bulan'] == 8) {$tgl = 'Agustus';} 
			                        		 elseif ($tl['bulan'] == 9) {$tgl = 'September';}
			                        		 elseif ($tl['bulan'] == 10) {$tgl = 'Oktober';} 
			                        		 elseif ($tl['bulan'] == 11) {$tgl = 'November';} 
			                        		 elseif ($tl['bulan'] == 12) {$tgl = 'Desember';} ;
			                        		 ?>
			                        		<?= $tgl; ?>
			                        		</td>
			                          <td>
			                            <a href="<?= base_url('kas/pemasukan/').$tl['bulan']; ?>" class="text-primary"><i class="fas fa-fw fa-print"></i></a>
			                            <!-- <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a> -->
			                          </td>
			                        </tr>
			                        <?php $i++; ?>
			                  	<?php endforeach; ?>
			                  	<tr>
			                        <th scope="col">Total</th>
			                        <th scope="col"><?= $jumlahLaba['nominal']; ?></th>
			                        <th scope="col"><?= $jumlahBulan; ?> Bulan</th>
			                        <th></th>
			                  	</tr>
			                  </tbody>
			                  <tfoot>
			                    <tr>
			                        <!-- <th scope="col">#</th> -->
			                        <!-- <th scope="col">Nominal</th> -->
			                        <!-- <th scope="col">Bulan</th> -->
			                       <!--  <th scope="col">Action</th> -->
			                      </tr>
			                  </tfoot>
			                </table>
			              </div>
			            </div>
			          </div>

				    </div>
				  </div>

		 	<!-- End DATA Pemasukan Kas PER Bulan -->
		</div>

		<div class="row">
		  <!-- DATA Pengeluaran Kas -->
	
				<div class="col">
				    <div class="collapse multi-collapse" id="multiCollapseExample2">
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-4">
			                  <h6 class="m-0 mt-2 font-weight-bold text-danger">Data Pengeluaran Kas </h6>
			                </div>
			                     <div class="ml-auto mt-auto col-md-8">
			                           <form action="<?= base_url('upload/kas/pengeluaran'); ?>" method="post" style="margin-left: 10px;">
			                                <div class="row">
			                                    <div class="input-group col">
			                                    	<input type="text" name="keterangan" id="keterangan" class="form-control" required placeholder="Masukkan keterangan...">
			                                    </div>
			                                  <div class="input-group col">
			                                        <input type="text" id="nominal" name="nominal" placeholder="Masukkan Nominal Uang..." class="form-control" autocomplete="off" autofocus required>
			                                    <div class="input-group-append">
			                                          <button type="submit" class="btn btn-outline-success">Input</button>
			                                      </div>
			                                  </div>
			                                </div>
			                              </form>
			                            </div>
			                                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="dataPengeluaran" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">User ID</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tanggal</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </thead>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($kasPengeluaran as $k): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $k['user_id']; ?></td>
			                        	<td><?= $k['nominal']; ?></td>
			                        	<td><?= date('d-M-Y',$k['waktu']); ?></td>
			                          <td>
			                            <a href="" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
			                            <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
			                          </td>
			                        </tr>
			                        <?php $i++; ?>
			                  	<?php endforeach; ?>
			                  </tbody>
			                  <tfoot>
			                    <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">User ID</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tanggal</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </tfoot>
			                </table>
			              </div>
			            </div>
			          </div>

				    </div>
				  </div>

		 	<!-- End DATA Pengeluaran Kas -->
		</div>

		
		
		<div class="row">
		 	<!-- DATA Pengeluaran Kas PER Bulan -->
	
				<div class="col">
				    <div class="collapse multi-collapse" id="dataPengeluaranPerBulan">
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-6">
			                  <h6 class="m-0 mt-2 font-weight-bold text-danger">Total Data Pengeluaran</h6>
			                </div>
			                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="totalDataPengeluaran" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Bulan</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </thead>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($totalRugi as $tr): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $tr['nominal']; ?></td>
			                        	<td>
			                        		<?php if ($tr['bulan'] == 1) {$tgl = 'Januari';}
			                        		 elseif ($tr['bulan'] == 2) {$tgl = 'Februari';} 
			                        		 elseif ($tr['bulan'] == 3) {$tgl = 'Maret';} 
			                        		 elseif ($tr['bulan'] == 4) {$tgl = 'April';} 
			                        		 elseif ($tr['bulan'] == 5) {$tgl = 'Mei';} 
			                        		 elseif ($tr['bulan'] == 6) {$tgl = 'Juni';} 
			                        		 elseif ($tr['bulan'] == 7) {$tgl = 'Juli';} 
			                        		 elseif ($tr['bulan'] == 8) {$tgl = 'Agustus';} 
			                        		 elseif ($tr['bulan'] == 9) {$tgl = 'September';}
			                        		 elseif ($tr['bulan'] == 10) {$tgl = 'Oktober';} 
			                        		 elseif ($tr['bulan'] == 11) {$tgl = 'November';} 
			                        		 elseif ($tr['bulan'] == 12) {$tgl = 'Desember';} ;
			                        		 ?>
			                        		<?= $tgl; ?>
			                        		</td>
			                          <td>
			                            <a href="<?= base_url('kas/Pengeluaran/').$tr['bulan']; ?>" class="text-primary"><i class="fas fa-fw fa-print"></i></a>
			                            <!-- <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a> -->
			                          </td>
			                        </tr>
			                        <?php $i++; ?>
			                  	<?php endforeach; ?>
			                  	<tr>
			                        <th scope="col">Total</th>
			                        <th scope="col"><?= $jumlahLaba['nominal']; ?></th>
			                        <th scope="col"><?= $jumlahBulan; ?> Bulan</th>
			                        <th></th>
			                  	</tr>
			                  </tbody>
			                  <tfoot>
			                    <tr>
			                        <!-- <th scope="col">#</th> -->
			                        <!-- <th scope="col">Nominal</th> -->
			                        <!-- <th scope="col">Bulan</th> -->
			                       <!--  <th scope="col">Action</th> -->
			                      </tr>
			                  </tfoot>
			                </table>
			              </div>
			            </div>
			          </div>

				    </div>
				  </div>

		 	<!-- End DATA Pengeluaran Kas PER Bulan -->
		</div>

       
       <div class="row">
		  <!-- DATA Kas -->
	
				<div class="col">
				    <div class="collapse multi-collapse" id="multiCollapseExample3">
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-4">
			                  <h6 class="m-0 mt-2 font-weight-bold text-primary">Data Kas </h6>
			                </div>
			                          <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="dataKas" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">User Id</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tunggakan</th>
			                        <th scope="col">Cadangan</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </thead>
			                  <tfoot>
			                    <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">User Id</th>
			                        <th scope="col">Nominal</th>
			                        <th scope="col">Tunggakan</th>
			                        <th scope="col">Cadangan</th>
			                        <th scope="col">Action</th>
			                      </tr>
			                  </tfoot>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($kas as $ka): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $ka['name']; ?></td>
			                        	<td><?= $ka['nominal']; ?></td>
			                        	<td>
			                        		<?php if ($kalkulasi['kas']-$ka['nominal'] < 0): ?>
			                        			0
			                        		<?php else: ?>
			                        			<?= $kalkulasi['kas']-$ka['nominal']; ?>
			                        		<?php endif ?>
			                        	</td>
			                        	<td>
			                        		<?php if ($ka['nominal']-$kalkulasi['kas'] < 0): ?>
			                        			0
			                        		<?php else: ?>
			                        			<?= $ka['nominal']-$kalkulasi['kas']; ?>
			                        		<?php endif ?>
			                        	</td>
			                          <td>
			                            <a href="" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
			                            <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
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

		 	<!-- End DATA  Kas -->
		</div>


	    </div>
	<!-- /.container-fluid -->

     </div>
    <!-- End of Main Content -->