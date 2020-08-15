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
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Penulis</th>
                                             <th>Judul</th>
                                             <th>Status</th>
                                             <th>Tanggal dibuat</th>
                                             <th>Kunjungan</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="3"></th>
                                             <th></th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                     <?php $i=1; ?>
                                        <?php foreach ($artikel as $a): ?>
                                            <tr>
	                                        <td><?= $i; ?></td>
	                                        <td><?= $a['name']; ?></td>
	                                        <td><?= $a['judul']; ?></td>
	                                        <td>
	                                        	<?php if ($a['is_active'] == 0): ?>
	                                        		<p class="text-danger">Inactive</p>
	                                        	<?php else: ?>
	                                        		<p class="text-success">Active</p>
	                                        	<?php endif ?>
	                                        </td>
	                                        <td><?= date('d-F-Y H:i', $a['time']); ?></td>
                                            <td><?= $a['lihat']; ?></td>
	                                        <td>
                                                <?php if ($a['is_active'] == 1): ?>
                                                    <a href="<?= base_url('update/blog/') . $a['id'] . '/' . $a['judul']; ?>" class="text-success"><i class="fas fa-fw fa-exclamation-circle"></i></a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('update/blog/') . $a['id'] . '/' . $a['judul']; ?>" class="text-danger"><i class="fas fa-fw fa-exclamation-circle"></i></a>
                                                <?php endif ?>
	                                        	    <a href="<?= base_url('blog/artikel/') . $a['id'] . '/' . $a['judul']; ?>" class="text-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                    <a href="<?= base_url('hapus/blog/') . $a['id'] . '/' . $a['judul']; ?>" class="text-danger"><i class="fas fa-fw fa-trash"></i></a>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah <?= $title; ?> Baru</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?= form_open_multipart('blog/input'); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                    <input required type="text" name="judul" id="judul" class="form-control" placeholder="Masukan judul artikel...">
                                 </div> 
                                 <div class="form-group">
                                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control">Masukan deskripsi artikel</textarea>
                                 </div> 
                                 <div class="form-group">
                                     <div class="custom-file">
										<input required type="file" class="custom-file-input" id="image" name="image">
										<label class="custom-file-label" for="image">Masukan header gambar artikel</label>
									</div>
                                 </div> 
                                 <div class="form-group">
	                                <select class="form-control" id="tag" name="tag">
	                                 	<option>--Pilih tag--</option>
	                                 	<?php foreach ($tag as $t): ?>
	                                      <option value="<?= $t['tag']; ?>"><?= $t['tag']; ?></option>
	                                 	<?php endforeach; ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
	                                <input type="radio" name="is_active" id="is_active" value="1" required>
	                                Aktif
	                                <input type="radio" name="is_active" id="is_active" value="0" required>
	                                Tidak Aktif
                                 </div> 
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="user_id" name="user_id" value="ITP-<?= $user['id']; ?>" placeholder="Jangka waktu materi">
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


