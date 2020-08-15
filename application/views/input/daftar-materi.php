             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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

						<div class="row" style="padding-left: -10px;">
                         <?= $this->session->flashdata('message'); ?>
						</div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-lg shadow mb-4">
                         <div class="card-header py-3 row">
                         	<div class="col">
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
                         	</div>
                         	<div class="col">
                             <h6 class="m-0 float-right font-weight-bold text-primary"><?= $pengajar['pengajar']; ?></h6>
                         	</div>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-8 float-left">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" id="cari" name="cari" placeholder="Cari Member.." class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                 <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 float-right">
                                        <?php if(!$user['role_id'] == 1) :?>
                                        <?php else: ?>
                                         <a href="" class="btn btn-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                     <?php endif; ?>
                                    </div>
                                </div>
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Judul Materi</th>
                                             <th>Jurusan</th>
                                             <th>Tingkatan</th>
                                             <th>Waktu</th>
                                            <?php if(!$user['role_id'] == 1) :?>
                                             <?php else: ?>
                                             <th>Action</th>
                                             <?php endif; ?>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th></th>
                                             <th></th>
                                             <th></th>
                                             <th></th>
                                          
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                         <?php $i = 1; ?>
                                         <?php foreach ($materi as $m) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $m['materi']; ?></td>
                                                 <td><?= $m['jurusan']; ?></td>
                                                 <td>
                                                 	<?php if($m['tingkatan'] == 1) : ?>
                                                       Pemula
                                                     <?php elseif ($m['tingkatan'] == 2) :?>
                                                        Menengah
                                                    <?php else : ?>
                                                        Ahli
                                                    <?php endif; ?>
                                                    </td>
                                                 <td><?= $m['waktu']; ?> Minggu</td>
                                                 <?php if(!$user['role_id'] == 1) :?>
                                                 <?php else: ?>
                                                 <td>
                                                     <a href="<?= base_url('edit/list/') . $m['id'] . '/' . $m['user_id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                     <a href="<?= base_url('hapus/list/') . $m['id'] . '/' . $m['user_id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini? Klik OK untuk melanjutkan.');"><i class="fas fa-fw fa-trash"></i></a>
                                                 </td>
                                             <?php endif; ?>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah <?= $title; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('input/daftar/') . $m['user_id'] ; ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="materi" name="materi" placeholder="Masukkan judul materi">
                                 </div> 
                                 <div class="form-group">
                                     <input type="number" class="form-control" id="waktu" name="waktu" placeholder="Jangka waktu materi">
                                 </div> 
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="pengajar" name="pengajar" value="<?= $m['pengajar']; ?>" placeholder="Jangka waktu materi">
                                     <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $m['user_id']; ?>" placeholder="Jangka waktu materi">
                                     <input type="hidden" class="form-control" id="jurusan" name="jurusan" value="<?= $m['jurusan']; ?>" placeholder="Jangka waktu materi">
                                     <input type="hidden" class="form-control" id="tingkatan" name="tingkatan" value="<?= $m['tingkatan']; ?>" placeholder="Jangka waktu materi">
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


