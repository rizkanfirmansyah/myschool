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
                            <?php if ($this->session->userdata('role_id') == 1): ?>
                                    <div class="col-md-8 float-right">
                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                    </div>
                            <?php else: ?>
                            <?php endif ?>
                            </div>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                              
                                 <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Nama</th>
                                             <th>User ID</th>
                                             <th>Email</th>
                                             <th>Kelas</th>
                                             <th>Image</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="5" style="text-align: center;">
                                             </th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                        <?php $i=1; ?>
                                         <?php foreach ($member as $m) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $m['nama']; ?></td>
                                                 <td><?= $m['user_id']; ?></td>
                                                 <td><?= $m['email']; ?></td>
                                                 <td><?= $m['kelas']; ?></td>
                                                 <td><img width="50" src="<?= base_url('assets/img/member/') . $m['image']; ?>" alt="<?= $m['nama']; ?>" class="img-responsive"></td>

                                                    <?php if($m['is_active'] == 0) : ?>
                                                     <td style="color:red;">Inactive</td>
                                                     <?php else: ?>
                                                     <td style="color:green;">Active</td>
                                                    <?php endif; ?>
                                                 
                                                 <td>
                                                     <a href="<?= base_url('edit/member/') . $m['id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                     <a href="<?= base_url('lihat/member/') . $m['email']; ?>" class="badge badge-success"><i class="fas fa-fw fa-eye"></i></a>
                                                     <a href="<?= base_url('hapus/member/') . $m['id']; ?>" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
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
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Tambah member baru</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('data/tambahmember/'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap member" required>
                                 </div>
                                 <div class="form-group">
                                     <select name="email" id="email" class="form-control">
                                         <option value="">Pilih email</option>
                                         <?php foreach ($users as $r) : ?>
                                             <option value="<?= $r['email']; ?>"><?= $r['email']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas ex: XII-TKJ2" required>
                                 </div>
                                 <div class="form-group">
                                     <input type="date" class="form-control" id="date" name="date" required>
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


