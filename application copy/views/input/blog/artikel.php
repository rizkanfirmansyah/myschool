             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <?php if (validation_errors()) : ?>
                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <?= validation_errors(); ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                         <?php endif; ?>

				    
                <div class="row">
                    <div class="col text-center">
                        <h3>
                            <?= $artikel['judul']; ?>
                        </h3>
                            <img src="<?= base_url('assets/img/artikel/') . $artikel['image']; ?>" alt="" width="400">
                    </div>
                </div>
					<form action="<?= base_url('blog/artikel/' . $artikel['id'] . '/' . $artikel['judul']); ?>" method="post">
						<textarea name="artikel" id="ckeditor" class="ckeditor" cols="30" rows="10"></textarea>
						<button class="btn btn-success" type="submit">Input</button>
					</form>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->