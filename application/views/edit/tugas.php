             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->

                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                 <div class="row">
                 	<div class="col-lg-11 card p-5">
                 		<form action="<?= base_url('edit/tugas/'). $tugas['id']; ?>" method="post">
                 		  <div class="form-group row">
						    <label for="id_pengajar" class="col-sm-2 col-md-1 col-form-label">IDP</label>
						    <div class="col-sm-2">
						      <input type="text" class="form-control" id="id_pengajar" name="id_pengajar" value="<?= $tugas['id_pengajar']; ?>" readonly>
						    </div>
						   <label for="materi" class="col-sm-2 col-md-2">Materi</label>
							    <div class="col-sm-6">
							    	<select class="form-control" name="materi" id="materi"><?= $tugas['materi']; ?>
							    		<?php foreach ($materi as $m) :  ?>
							    			<option value="<?= $m['materi']; ?>"><?= $m['materi']; ?></option>
							    		<?php endforeach; ?>
						    		</select>
							    </div>
						    </div>
						   <div class="form-group row">
								<label for="jenis_file" class="col-sm-2">Jenis File</label>
								<div class="col-sm-3">
									 <select class="form-control" id="jenis_file" name="jenis_file">
								      <option value="<?= $tugas['jenis_file']; ?>">
								      	<?php if($tugas['jenis_file'] == 'video') : ?>
								      	Video
										<?php else: ?>
										File
										<?php endif; ?>
								      </option>
								      <?php if($tugas['jenis_file'] == 'file') : ?>
								      <option value="video">Video</option>
										<?php else: ?>
								      <option value="file">File</option>
										<?php endif; ?>
								    </select>
								</div>
								<label for="file" class="col-sm-1">URL</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="file" name="file" value="<?= $tugas['file']; ?>">
									<?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
								
								</div>
							  </div>
						    <div class="form-group row">
							    <div class="col-sm-1">Batas Waktu</div>
							    <div class="col-sm-10">
							    	<div class="row">
							    		<div class="col-sm-5">
										  <input type="date" class="form-control" id="waktu" name="waktu" value="<?= $tugas['batas_waktu']; ?>">
							    		</div>
							    		<label for="time" class="col-sm-2">Waktu</label>
										    <div class="col-sm-3">
												   <input type="number" class="form-control" id="time" name="time" value="<?= $tugas['time']; ?>">
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