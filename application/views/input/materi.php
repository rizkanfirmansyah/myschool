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


                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

             <div class="row">
                <div class="card col-lg shadow mb-4">   
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-4">
                             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> Management</h6>
                            </div>
                                    <div class="col-md-8 float-right">
                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                    </div>
                            </div>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>ID Pengajar</th>
                                             <th>Bidang Keahlian</th>
                                             <th>Tingkatan</th>
                                             <th>Pengajar/Pemateri</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th></th>
                                             <th></th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                         <?php $i = 1; ?>
                                         <?php foreach ($materi as $m) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $m['user_id']; ?></td>
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
                                                 <td><?= $m['pengajar']; ?></td>
                                                 
                                                 <td>
                                                    <?php if(!$user['role_id'] == 1) :?>
                                                    <?php else: ?>
                                                         <a href="<?= base_url('edit/materi/') . $m['user_id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                         <a href="<?= base_url('hapus/materi/') . $m['user_id']; ?>" onclick="return confirm('Apakah kamu ingin menghapus data ini? Klik OK untuk melanjutkan.');" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
                                                    <?php endif; ?>
                                                         <a href="<?= base_url('input/list/ITP-') . $user['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-folder-open"></i></a>
                                                         <a href="<?= base_url('input/daftar/') . $m['user_id']; ?>" class="badge badge-success"><i class="fas fa-fw fa-eye"></i></a>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah Pengajar <?= $title; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('input/materi'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="pengajar" name="pengajar" placeholder="Nama pengajar">
                                 </div> 
                                 <div class="form-group">
                                     <select class="form-control" id="jurusan" name="jurusan">
                                      <option value="Networking">Networking</option>
                                      <option value="Programming">Programming</option>
                                      <option value="Multimedia">Multimedia</option>
                                    </select>
                                 </div> 
                                 <div class="form-group">
                                     <select class="form-control" id="tingkatan" name="tingkatan">
                                      <option value="1">Pemula</option>
                                      <option value="2">Menengah</option>
                                      <option value="3">Ahli</option>
                                    </select>
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


