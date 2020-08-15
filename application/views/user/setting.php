             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
				

				    <div class="row">
                 	<div class="col-md-6">
                 		<?= $this->session->flashdata('message'); ?>
                 				<div class="card shadow mb-4">  
				                    <div class="card-header py-3">
				                        <div class="row">
				                            <div class="col-md-10">
				                             <h6 class="m-0 font-weight-bold text-primary">Pengaturan Web</h6>
				                            </div>
				                            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
				                                    <div class="col-md-2 float-right">
				                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#setting"><i class="fas fa-fw fa-plus"></i></a>
				                                    </div>
												<?php else: ?>
												<?php endif ?>
				                            </div>
				                         </div>
						            <div class="card-body">
						              <div class="table-responsive">
						              	<?php if ($this->session->userdata('tabel') == 'table'): ?>
						               		 <table class="table table-borderless" id="datatables2" width="100%" cellspacing="0">
						              	<?php else: ?>
						               		 <table class="table table-borderless" id="datatables" width="100%" cellspacing="0">
						              	<?php endif ?>
						                  <thead>
						                    <tr>
												<th>Setting</th>
												<th>Paramater</th>
												<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
													<th>Action</th>
												<?php else: ?>
												<?php endif ?>
						                    </tr>
						                  </thead>
						                  <tfoot>
						                    <tr>
						                      <th></th>
						                      <th></th>
						                      <th></th>
						                      <th></th>
						                    </tr>
						                  </tfoot>
						                  <tbody>
						                  	<?php foreach ($setting as $st): ?>
											<tr>
												<td><?= $st['nama']; ?></td>
												<td class="">
													<?php if ($this->session->userdata($st['nama']) == null): ?>
														<a href="<?= base_url('developer/changesetting/'.$st['nama'].'/'.$st['value_akhir'] ); ?>"><i class="fas fa-<?= $st['value_akhir']; ?>"></i>	</a>			
													<?php elseif ($this->session->userdata($st['nama']) == $st['value_akhir']) : ?>
														<a href="<?= base_url('developer/changesetting/'.$st['nama'].'/'.$st['value_awal'] ); ?>"><i class="fas fa-<?= $st['value_awal']; ?>"></i></a>				
													<?php elseif ($this->session->userdata($st['nama']) == $st['value_awal']) : ?>
														<a href="<?= base_url('developer/changesetting/'.$st['nama'].'/'.$st['value_akhir'] ); ?>"><i class="fas fa-<?= $st['value_akhir']; ?>"></i>	</a>			
													<?php endif ?>
												</td>
												<td>
													<a href=""><i class="fas fa-trash"></i></a>
													<a href=""><i class="fas fa-edit"></i></a>
													<a href=""><i class="fas fa-check"></i></a>
												</td>
											</tr>
					                  	<?php endforeach ?>
						                  </tbody>
						              </table>
						          </div>
						      </div>
						  </div>
                 	</div>
                 	<div class="col-md-6">
                 				
                 				</div>
                 </div>
	
             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->


        <!-- Modal -->
			<div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="settingLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="settingLabel">Add SetRule</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     <form method="post" action="<?= base_url('developer/uset/add'); ?>">
			      <div class="modal-body">
						    <div class="col">
						      <input type="text" class="form-control" placeholder="nama pengaturan" name="nama" id="nama">
						    </div>
						    <br>
						    <div class="col">
						      <input type="text" class="form-control" placeholder="masukan nilai awal" name="value_awal" id="value_awal">
						      <br>
						    </div>
						    <div class="col">
						      <input type="text" class="form-control" placeholder="masukan nilai akhir" name="value_akhir" id="value_akhir">
						      <br>
						    </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add rule</button>
			      </div>
			    </div>
			</form>
			  </div>
			</div>