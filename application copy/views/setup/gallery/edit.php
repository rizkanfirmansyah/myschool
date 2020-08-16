             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
			
			<?= form_open_multipart('upload/update/'. $gallery['id']);?>
				<div class="card" >
					<div class="row no-gutters">
						<div class="col-md-4">
						  <img src="<?= base_url('assets/img/gallery/'). $gallery['gambar']; ?>" class="img-thumbnail card-img-top" alt="...">
						  <div class="row mt-2 mx-1">
						  	<div class="col">
						  	<a href="<?= base_url('hapus/gambar/gallery/'.$gallery['id']); ?>" class="btn btn-danger">Hapus <i class="fas fa-trash"></i></a>
						  	</div>
						  	<div class="col-md-8">
							   <div class="custom-file">
									<input type="file" class="custom-file-input" id="image" name="image">
									<label class="custom-file-label" for="image">Choose file</label>
								</div>
						  	</div>
						  </div>
						  <div class="alert alert-warning mx-2 mt-2" role="alert">
						  	<div class="row">
						  		<div class="col-md-2 mx-auto my-auto">
						  			<i class="fas fa-exclamation-triangle fa-2x"></i>
						  		</div>
						  		<div class="col">
							  		Gambar yang telah dihapus tidak bisa dikembalikan, mohon upload ulang image jika diperlukan.  
						  		</div>
						  	</div>
							</div>
						</div>
					<div class="col-md-8">
					  <div class="card-body">
					    <h5 class="card-title">
							<input type="text" class="form-control" id="judul" name="judul" value="<?= $gallery['judul']; ?>">
					    </h5>
					    <p class="card-text">
							<textarea name="keterangan" id="keterangan" cols="10" rows="3" class="form-control"><?= $gallery['keterangan']; ?>
							</textarea>
					    </p>
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"><?= date('d-M-Y H:i', $gallery['waktu']); ?></li>
					    <li class="list-group-item">
					    	<?php if ($gallery['status'] == 1): ?>
					    		<a class="text-success">Active</a>
					    	<?php else: ?>
					    		<a class="text-danger">Inactive</a>
					    	<?php endif ?>
					    	<a href="<?= base_url('edit/status/image/'). $gallery['status'] . '/' . $gallery['id']; ?>" class="text-warning"><i class="fas fa-retweet"></i></a>
					    </li>
					    <li class="list-group-item">
							Diupload oleh <?= $gallery['name']; ?>
					    </li>
					  </ul>
					  <div class="card-body text-right">
					    <a href="<?= base_url('setup/gallery'); ?>" class="btn btn-secondary text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
					    <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
					    <button type="reset" class="btn btn-warning text-white"><i class="fas fa-undo"></i> Reset</button>
					  </div>
					</div>
				</div>
			</div>	
		<?= form_close(); ?>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->