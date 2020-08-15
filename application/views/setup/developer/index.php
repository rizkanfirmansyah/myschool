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
				                             <h6 class="m-0 font-weight-bold text-primary">Setup Maintanance</h6>
				                            </div>
				                                    <div class="col-md-2 float-right">
				                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#setMaintanance"><i class="fas fa-fw fa-plus"></i></a>
				                                    </div>
				                            </div>
				                         </div>
						            <div class="card-body">
						              <div class="table-responsive">
						                <table class="table table-borderless" id="datatables2" width="100%" cellspacing="0">
						                  <thead>
						                    <tr>
												<th>Setting</th>
												<th>Param</th>
												<th>Status</th>
												<th>Action</th>
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
						                  	<?php foreach ($setrule as $st): ?>
											<tr>
												<td><?= $st['setting']; ?></td>
												<td><?= $st['parameter']; ?></td>
												<td class="text-center">
													<?php if ($st['rule'] == 0): ?>
														<i class="fas fa-thumbs-up text-success"></i>
													<?php else: ?>
														<i class="fas fa-thumbs-down text-danger"></i>
													<?php endif ?>
												</td>
												<td>
													<a href="<?= base_url('developer/changerule/'.$st['id']. '/' . $st['rule']); ?>" class="text-warning"><i class="fas fa-times"></i></a>
													<a href="<?= base_url('hapus/setrule/'.$st['id']); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
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
                 				<div class="card shadow mb-4">
						            <div class="card-header py-3">
						              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
						            </div>
						            <div class="card-body">
						              <div class="table-responsive">
						                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
						                  <thead>
						                    <tr>
												<th>Setting</th>
												<th>Status</th>
												<th>Param</th>
												<th>Action</th>
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
						                  	<?php foreach ($uiset as $st): ?>
											<tr>
												<td><?= $st['setting']; ?></td>
												<td class="text-left pl-4">
													<i class="fas fa-circle text-<?= $st['parameter']?>"></i>
												</td>
												<td>
													<?php $themecolor = ['primary', 'success', 'danger', 'warning', 'info', 'white', 'secondary', 'dark'] ?>
													<?php foreach ($themecolor as $tc): ?>
														<a href="<?= base_url('developer/changes/'. $st['setting'] .'/'.$tc); ?>"><i class="fas fa-circle text-<?=$tc;?>"></i></a>
													<?php endforeach ?>
												</td>
												<td>
													<a href="<?= base_url('developer/changerule/'.$st['id']. '/' . $st['rule']); ?>" class="text-warning"><i class="fas fa-times"></i></a>
													<a href="<?= base_url('hapus/setrule/'.$st['id']); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
												</td>
											</tr>
					                  	<?php endforeach ?>
						                  </tbody>
						              </table>
						          </div>
						      </div>
						  </div>
                 	</div>
                 </div>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

        <!-- Modal -->
			<div class="modal fade" id="setMaintanance" tabindex="-1" role="dialog" aria-labelledby="setMaintananceLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="setMaintananceLabel">Add SetRule</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     <form method="post" action="<?= base_url('developer/setrule/maintanance'); ?>">
			      <div class="modal-body">
						  <div class="row">
						    <div class="col">
						      <select name="setting" id="setting" class="form-control text-capitalize">
						      	<option value="all">all</option>
						      	<?php foreach ($controller as $c): ?>
							      	<option value="<?= $c['nama_komponen']; ?>"><?= $c['nama_komponen']; ?></option>
						      	<?php endforeach ?>
						      </select>
						    </div>
						    <div class="col">
						      <input type="text" class="form-control" placeholder="method" name="parameter" id="parameter">
						    </div>
						    <div class="col">
						      <select name="rule" id="rule" class="form-control">
						      	<option value="0">normal</option>
						      	<option value="1">maintanance</option>
						      </select>
						    </div>
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