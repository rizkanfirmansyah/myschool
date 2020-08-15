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
                                             <th>Soal</th>
                                             <th>A</th>
                                             <th>B</th>
                                             <th>C</th>
                                             <th>D</th>
                                             <th>Jawaban</th>
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
                                     	<?php foreach ($soal as $s): ?>
                                     	<tr>
                                     		<td><?= $i; ?></td>
                                     		<td><?= $s['soal']; ?></td>
                                     		<td><?= $s['a']; ?></td>
                                            <td><?= $s['b']; ?></td>
                                            <td><?= $s['c']; ?></td>
                                            <td><?= $s['d']; ?></td>
                                            <td class="text-uppercase"><?= $s['jawaban']; ?></td>
                                     		<td>
                                     			<a href="<?= base_url('soal/manage/').$s['id_soal']; ?>" class=""><i class="fas fa-edit"></i></a>
                                     			<a href="<?= base_url('hapus/soal/').$s['id']. '/' . $s['id_soal']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                     			<a href="" class=""><i class="fas fa-edit"></i></a>
                                     		</td>
                                     	</tr>
                                     	<?php $i++; ?>
                                     <?php endforeach ?>
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
                         <?= form_open_multipart('soal/soal'); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                    <textarea name="soal" id="soal" cols="10" rows="5" class="form-control">Masukan soal</textarea>
                                 </div> 
                                 <div class="form-group">
                                    <input type="hidden" name="id_soal" id="id_soal" value="<?= $id_soal; ?>">
                                 </div>
                                 <div class="form-group">
                                    <input type="text" name="a" id="a" class="form-control" placeholder="Masukan Jawaban A" required>
                                 </div> 
                                 <div class="form-group">
                                    <input type="text" name="b" id="b" class="form-control" placeholder="Masukan Jawaban B" required>
                                 </div> 
                                 <div class="form-group">
                                    <input type="text" name="c" id="c" class="form-control" placeholder="Masukan Jawaban C" required>
                                 </div> 
                                 <div class="form-group">
                                    <input type="text" name="d" id="d" class="form-control" placeholder="Masukan Jawaban D" required>
                                 </div>
                                  <div class="form-group">
	                                <select class="form-control" id="jawaban" name="jawaban" required>
	                                 	<option>--Pilih Jawaban soal--</option>
	                                      <option value="a">A</option>
                                          <option value="b">B</option>
                                          <option value="c">C</option>
                                          <option value="d">D</option>
                                    </select>
                                 </div>
                                 <input type="hidden" name="jurusan" value="<?= $cek['jurusan']; ?>">
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


