             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
				

					<?= form_open_multipart('update/gambarfooter'); ?>
					<div class="col-md-6 text-center">
						<img src="<?= base_url('assets/img/images/'.$dataslider['gambar']); ?>" alt="<?= $dataslider['judul']; ?>" width="200" class="img-responsive">
							<div class="custom-file mt-2">
							<input type="file" class="custom-file-input" id="image" name="image" required>
							<label class="custom-file-label" for="image">Choose file</label>
							</div>
							</div>
							<input type="hidden" id="id" name="id" value="<?= $dataslider['id']; ?>">
						<button type="submit" class="btn btn-success text-right ml-3 mt-2">submit</button>
					<?= form_close(); ?>
		
             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->