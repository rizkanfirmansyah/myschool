             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">
                 	<div class="col-lg-8">
                 		<?= form_open_multipart('edit/siswa/') ; ?>

                 		  <div class="form-group row">
						    <label for="email" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" readonly>
						    </div>
						    <label for="nama" class="col-sm-1 col-form-label"> ID</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
						        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						  </div> 
						  <div class="form-group row">
						    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>">
						        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						    <label for="nama" class="col-sm-1 col-form-label">Kelas</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $siswa['kelas']; ?>">
						        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						  </div>
						   <div class="form-group row">
							    <label for="is_active" class="col-sm-2">Status</label>
							    <div class="col-sm-4">
								    <select class="form-control" id="is_active" name="is_active">
								      <option value="<?= $siswa['is_active']; ?>">
								      	<?php if($siswa['is_active'] < 1) : ?>
								      	Inactive
										<?php else: ?>
										Active
										<?php endif; ?>
								      </option>
								      <?php if($siswa['is_active'] < 1) : ?>
								      <option value="1">Active</option>
										<?php else: ?>
								      <option value="0">Inactive</option>
										<?php endif; ?>
								    </select>
							    </div>
								
								<label for="ttl" class="col-sm-2">Tanggal Lahir</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="ttl" name="ttl" value="<?= $siswa['ttl']; ?>">
									<?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							  </div>
						    <div class="form-group row">
							    <div class="col-sm-2">Picture</div>
							    <div class="col-sm-10">
							    	<div class="row">
							    		<div class="col-sm-3">
							    			<img src="<?= base_url('assets/img/siswa/') . $siswa['gambar']; ?>" alt="" class="img-thumbnail">
							    		</div>
							    		<div class="col-sm-9">
							    			<div class="custom-file">
												  <input type="file" class="custom-file-input" id="gambar" name="gambar">
												  <label class="custom-file-label" for="gambar">Choose file</label>
												</div>
							    		</div>
							    	</div>
							    </div>
							  </div>

							  <div class="form-group row justify-content-end">
							  	<div class="col-sm-10">
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