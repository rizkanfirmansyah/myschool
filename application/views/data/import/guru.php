	             <!-- Begin Page Content -->
             <div class="container-fluid">
             	<?php $judul = $this->uri->segment(2); ?>

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
				
					<div class="jumbotron">
					  <h1 class="display-5"><i class="fas fa-database"></i> import data <?= $judul; ?></h1>
					  <p class="lead"></p>
					  <hr class="my-4">
					  <p>download template <a href="<?= base_url('download/template/'.$judul); ?>">disini</a></p>
					  <p class="lead">
					    <?= form_open_multipart('import/excel/'.$judul); ?>
					    <div class="row">
						    <div class="form-group col-md-6">
						    	<div class="custom-file">
												  <input type="file" class="custom-file-input" id="fileURL" name="fileURL">
												  <label class="custom-file-label" for="fileURL">Choose file</label>
												</div>
						    </div>
						    <div class="form-group col-md-6">
							    <button type="submit" class="btn btn-success ml-2"><i class="fas fa-check"></i></button>
						    </div>
					    </div>
					    <?= form_close(); ?>
					  </p>
					</div>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->