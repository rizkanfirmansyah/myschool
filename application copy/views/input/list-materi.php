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
                     <div class="col-lg-8">
                         <?= $this->session->flashdata('message'); ?>
                         <?php if (validation_errors()) : ?>
                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <?= validation_errors(); ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                         <?php endif; ?>

					
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-lg shadow mb-4">
                         <div class="card-header py-3 row">
                         	<div class="col-sm-12 col-md">
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
                         	</div>
                         	<div class="col-sm-12 col-md-4">
                             <h6 class="m-0 float-right font-weight-bold text-primary"><?= $pengajar['pengajar']; ?></h6>
                         	</div>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>Bab </th>
                                             <th>Judul Materi</th>
                                             <th>Jurusan</th>
                                             <th>Tingkatan</th>
                                             <th>Waktu</th>
                                             <th>Action</th>
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
                                                 <td><?= $m['bab']; ?></td>
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
                                                 <td>
                                                     <a href="<?= base_url('edit/list/') . $m['id'] . '/' . $m['user_id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                     <a href="<?= base_url('hapus/list/') . $m['id'] . '/' . $m['user_id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini? Klik OK untuk melanjutkan.');"><i class="fas fa-fw fa-trash"></i></a>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah <?= $title; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('input/list/') . $m['user_id'] ; ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="materi" name="materi" placeholder="Masukkan judul materi">
                                 </div> 
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="bab" name="bab" value="<?= $hitung; ?>">
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


