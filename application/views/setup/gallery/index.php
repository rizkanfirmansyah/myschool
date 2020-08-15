             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                    </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-6">
                         <?php if (validation_errors()) : ?>
                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <?= validation_errors(); ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                         <?php endif; ?>


                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-lg shadow mb-4">
                         <div class="card-header py-3">
                         	<div class="row">
	                             <h6 class="m-0  font-weight-bold text-primary">Database Menu Management</h6>
                             	<?php if ($this->session->userdata('print') == 'print'): ?>
	                             <a href="<?= base_url('hapus/cobaprint'); ?>" class="text-secondary ml-auto"><i class="fas fa-table"></i></a>
                                <?php else: ?>
	                             <a href="<?= base_url('hapus/cobaprint'); ?>" class="text-secondary ml-auto"><i class="fas fa-print"></i></a>
                             	<?php endif ?>
                         	</div>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                             	<?php if ($this->session->userdata('print') == 'print'): ?>
                                   <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                <?php else: ?>
                                   <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                             	<?php endif ?>
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Gambar</th>
                                             <th>Keterangan</th>
                                             <th>Tanggal</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="3"></th>
                                             <th class="text-center">4</th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                     	<?php $i=1; ?>
                                     	<?php foreach ($gallery as $g): ?>
                                             <tr>
                                             	<td><?= $i; ?></td>
                                             	<td class="text-center"><img width="125" src="<?= base_url('assets/img/gallery/'). $g['gambar']; ?>" alt="<?= $g['judul']; ?>"></td>
                                             	<td><?= $g['keterangan']; ?></td>
                                             	<td><?= date('d-M-Y', $g['waktu']); ?></td>
                                             	<td>
                                             		<?php if ($g['status'] == 1): ?>
                                             			<a class="text-success">Active</a>
                                             		<?php else: ?>
                                             			<a class="text-danger">Inactive</a>
                                             		<?php endif ?>
                                             	</td>
                                             	<td>
                                             		<a href="<?= base_url('edit/gallery/'.$g['id']); ?>" class="text-warning">
													    <i class="fas fa-edit"></i>
													</a>
                                             		<a href="<?= base_url('hapus/gallery/').$g['id'] . '/'. $g['gambar'] . '/' . urlencode(base64_encode($g['judul'])); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                             		<a href="<?= base_url('download/gallery/'. $g['gambar']); ?>" class="text-primary"><i class="fas fa-download"></i></a>
                                             	</td>
                                             </tr>
                                            <?php $i++; ?>
                                     	<?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- container-fluid -->

             </div>
             <!-- End of Main Content -->

             <!-- Modal -->

             <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Tambah Gambar Baru</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                             <div class="modal-body">
								  <div class="form-group">
								    <label for="judul">Judul</label>
								      <input type="text" class="form-control" name="judul" id="judul">
								  </div>
								  <div class="form-group">
								    <label for="deskripsi">Deskripsi</label>
								    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
								  </div>
								  <div class="custom-file">
									  <input type="file" class="custom-file-input" id="image" name="image">
									  <label class="custom-file-label" for="image">Choose file</label>
									</div>
                             </div>
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">Tambah</button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>

     <!-- Modal Ubah -->

		

