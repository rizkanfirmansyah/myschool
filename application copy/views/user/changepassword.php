             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                 <div class="row">
					<div class="col-lg-6">
		                 <?= $this->session->flashdata('message'); ?>
					</div>
                 </div>

                 	<div class="row">
                 		<div class="col-lg-6">
                 			<form action="<?= base_url('user/changepassword'); ?>" method="post">
                 				<div class="form-group">
                 					<label for="currentPassword">Password Lama :</label>
                 					<input type="password" name="currentPassword" id="currentPassword"class="form-control" />
                 					<?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                 				</div>
                 				<div class="form-group">
                 					<label for="newPassword1">Password Baru :</label>
                 					<input type="password" name="newPassword1" id="newPassword1" class="form-control" />
                 					<?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                 				</div>
                 				<div class="form-group">
                 					<label for="newPassword2">Konfirmasi Password Baru :</label>
                 					<input type="password" name="newPassword2" id="newPassword2" class="form-control" />
                 					<?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                 				</div>
                 				<div class="from-group">
                 					<button type="submit" class="btn btn-primary">Ubah Password</button>
                 				</div>
                 			</form>
                 		</div>
                 	</div>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->