	
 <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
			

			<div class="container">
				<div class="col-md-6" style="margin-left: -20px;">
                 	<?= $this->session->flashdata('message'); ?>
				</div>	
            </div>

		
		
				            <!-- DataTales Example -->
			          <div class="card shadow mb-4">
			            <div class="card-header py-3">
			              <div class="row">
			                <div class="col-md-6">
			                	<?php if ($identity == "Pemasukan"): ?>
				                  <h6 class="m-0 mt-2 font-weight-bold text-success">Total Data <?= $identity; ?></h6>
				                <?php else: ?>
				                  <h6 class="m-0 mt-2 font-weight-bold text-danger">Total Data <?= $identity; ?></h6>
			                	<?php endif ?>
			                </div>
			                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
			                        </div>
			                    </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
			                  <thead>
			                       <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Keterangan</th>
			                        <th scope="col">Tanggal</th>
			                        <th scope="col">Nominal</th>
			                      </tr>
			                  </thead>
			                  <tbody>
			                  	<?php $i=1; ?>
			                  	<?php foreach ($kas as $tl): ?>
			                        <tr>
			                        	<td><?= $i; ?></td>
			                        	<td><?= $tl['keterangan']; ?></td>
			                        	<td><?= date('d-M-Y',$tl['waktu']); ?></td>
			                        	<td><?= $tl['nominal']; ?></td>
			                        </tr>
			                        <?php $i++; ?>
			                  	<?php endforeach; ?>

			                  </tbody>
			                  <tfoot>
			                  	<tr>
			                        <th></th>
			                        <th scope="col">Total</th>
			                        <th scope="col"><?= $bulan; ?></th>
			                        <th scope="col"><?= $jumlahLaba['nominal']; ?></th>
			                  	</tr>
			                  </tfoot>
			                </table>
			              </div>

				    </div>
				  </div>


	    </div>
	<!-- /.container-fluid -->

     </div>
    <!-- End of Main Content -->