             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="row">
                 	<div class="col">
                 		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                 	</div>
                 	<div class="col text-right">
                 		<a href="<?= base_url('user/clearlog'); ?>" class="text-primary">Bersihkan <i class="fas fa-trash"></i></a>
                 	</div>
                 </div>
				
				<div class="card">
					<div class="responsive-table">
						<table class="table table-sm" id="datatables2">
						  <thead>
						    <tr>
						      <!-- <th scope="col">#</th> -->
						      <th scope="col">Time</th>
						      <th scope="col">History</th>
						      <th scope="col">Date</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $i=1; ?>
						  	<?php foreach ($log as $l): ?>
						    <tr>
						      <!-- <th scope="row"><?= $i; ?></th> -->
						      <td><?= $l['time']; ?></td>
						      <td><?= $l['class'].'/'.$l['method']; ?></td>
						      <td><?= date('d-M-Y H:i:s', $l['time']); ?></td>
						    </tr>
						    <?php $i++; ?>
						  	<?php endforeach; ?>
						  </tbody>
						</table>																																																			
					</div>
				</div>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->