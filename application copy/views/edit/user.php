             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->

                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                 <div class="row">
                 	<div class="col-lg-11 card p-5">
                 		<h3 style="text-align: center;margin-bottom: 20px;">Nama User : <?= $edit['name']; ?></h3>
                 		<?= form_open_multipart('edit/user/' . $edit['id'] . '/' . $edit['role_id']) ; ?>

                 		  <div class="form-group row">
						    <label for="email" class="col-sm-2 col-md-1 col-form-label">Email</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" id="email" name="email" value="<?= $edit['email']; ?>" readonly>
						    </div>
						   <label for="is_active" class="col-sm-2 col-md-1">Nama</label>
							    <div class="col-sm-5">
						    		<input type="text" class="form-control" id="name" name="name" value="<?= $edit['name']; ?>">
						        	<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							    </div>
						    </div>
						   <div class="form-group row">
								<label for="date_created" class="col-sm-1">Status</label>
								<div class="col-sm-3">
									 <select class="form-control" id="is_active" name="is_active">
								      <option value="<?= $edit['is_active']; ?>">
								      	<?php if($edit['is_active'] < 1) : ?>
								      	Inactive
										<?php else: ?>
										Active
										<?php endif; ?>
								      </option>
								      <?php if($edit['is_active'] < 1) : ?>
								      <option value="1">Active</option>
										<?php else: ?>
								      <option value="0">Inactive</option>
										<?php endif; ?>
								    </select>
								</div>
								<label for="date_created" class="col-sm-3">Bergabung pada tanggal</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="date_created" name="date_created" value="<?= date('d-F-Y', $edit['date_created']); ?>" readonly>
									<?= form_error('date_created', '<small class="text-danger pl-3">', '</small>'); ?>
								
								</div>
							  </div>
						    <div class="form-group row">
							    <div class="col-sm-1">Picture</div>
							    <div class="col-sm-10">
							    	<div class="row">
							    		<div class="col-sm-3">
							    			<img src="<?= base_url('assets/img/profile/') . $edit['image']; ?>" alt="" class="img-thumbnail">
							    		</div>
							    		<div class="col-sm-5">
							    			<div class="custom-file">
												  <input type="file" class="custom-file-input" id="image" name="image">
												  <label class="custom-file-label" for="image">Choose file</label>
												</div>
							    		</div>
							    		<label for="is_active" class="col-sm-1">Role</label>
										    <div class="col-sm-3">
												    <select class="form-control" id="role" name="role">
												      <option value="<?= $edit['role_id']; ?>"><?= $edit['role_id']; ?>
												      </option>
												      <?php foreach ($Edit as $e ) :?>
												     	 <option value="<?= $e['id']; ?>"><?= $e['role']; ?></option>
												 	 <?php endforeach; ?>
												    </select>
											    </div>
							    	</div>
							    </div>
							  </div>

							  <div class="form-group row justify-content-end">
							  	<div class="col-sm-11">
							  		<button type="submit" class="btn btn-primary">
							  			Simpan Perubahan
							  		</button>
							  	</div>
							  </div>
                 			
                 		</form>
                 	</div>
                 </div>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->