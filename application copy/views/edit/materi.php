             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">
                 	<div class="col-lg-8">
                 		<form action="<?= base_url('edit/materi/') . $materi['user_id'] ; ?>" method="post">
                 		  <div class="form-group row">
						    <label for="pengajar" class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" id="pengajar" name="pengajar" value="<?= $materi['pengajar']; ?>" readonly>
						    </div>
						    <label for="nama" class="col-sm-1 col-form-label"> ID</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $materi['user_id']; ?>" readonly>
						        <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						  </div> 
						   <div class="form-group row">
							    <label for="jurusan" class="col-sm-2">Bidang Keahlian</label>
							    <div class="col-sm-4">
								    <select class="form-control" id="jurusan" name="jurusan">
								      <option value="<?= $materi['jurusan']; ?>">
								      	<?= $materi['jurusan']; ?>
								      </option>
										<?php foreach ($jurusan as $j ) : ?>
											<?php if ($j['nama'] == $materi['jurusan']) :?>
												<option value="" style="display: none;"></option>
											<?php else: ?>
								     		 <option value="<?= $j['nama']; ?>"><?= $j['nama']; ?></option>
								     		<?php endif; ?>
								      	<?php endforeach; ?>
								    </select>
							    </div>
								
								<label for="tingkatan" class="col-sm-2">Tingkatan</label>
								<div class="col-sm-4">
									 <select class="form-control" id="tingkatan" name="tingkatan">
								      <option value="<?= $materi['tingkatan']; ?>">
								      	<?php if ($materi['tingkatan'] == 1) : ?>
								      		Pemula
								      	<?php elseif ($materi['tingkatan'] == 2) : ?>
								      		Menengah
								      	<?php else: ?>
								      		Ahli
								      	<?php endif; ?>
								      </option>
										<?php foreach ($tingkatan as $t ) : ?>
											<?php if ($t['id'] == $materi['tingkatan']) :?>
												<option value="" style="display: none;"></option>
											<?php else: ?>
												<option value="<?= $t['id']; ?>">	
													<?php if ($t['id'] == 1) : ?>
												      	Pemula
												     <?php elseif ($t['id'] == 2) : ?>
												      	Menengah
												     <?php else: ?>
												      	Ahli
												     <?php endif; ?></option>
								     		<?php endif; ?>
								      	<?php endforeach; ?>
								    </select>
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