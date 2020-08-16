  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="container">
            <div class="col-md-6 col-sm-12">
                 <?= $this->session->flashdata('message'); ?>
            </div>
        </div>

        <div class="card p2">
          <div class="card-header py-3">
            <div class="row" style="margin-bottom: -10px;">
                             <h6 class="m-0 ml-2 font-weight-bold text-primary">Data User <?= $judul['role']; ?></h6>
                                    <div class="ml-auto mr-2">
                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                    </div>
                         </div>
              </div>
                    <div class="card-body table-responsive">
          <table class="table table" id="datatables2">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <!-- <th scope="col">Identitas</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead> 
                     <tfoot>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <!-- <th scope="col">Identitas</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php $i=1; ?>
                        <?php foreach ($users as $sm) : ?>
                        <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="text-capitalize"><?= $sm['name']; ?></td>
                        <!-- // <td class="text-capitalize"><?= $sm['identitas']; ?></td> -->
                        <td class="text-capitalize"><?= $sm['role_id']; ?></td>
                        <td><?= $sm['email']; ?></td>
                        <td>
                           <?php if($sm['is_active'] < 1) : ?>
                            <p style="color: red;">Inactive</p>
                            <?php else : ?>
                            <p style="color: green;">Active</p>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d-F-Y', $sm['date_created']); ?></td>
                        <td><img src="<?= base_url('assets/img/profile/') . $sm['image']; ?>" alt="<?= $sm['image']; ?>" class="img-thumbnail" width="60"></td>
                        <td><a href="<?= base_url('hapus/user/'); ?><?= $sm['id']; ?>/<?= $sm['role_id']; ?>" class="badge badge-danger"  onclick=
                            "return confirm('Apakah kamu ingin menghapusnya? Klik OK untuk melanjutkan.');"><i class="fa fa-trash"></i></a>
                        <a href="<?= base_url('admin/user/'); ?><?= $sm['id']; ?>/<?= $sm['role_id']; ?>" class="badge badge-warning"><i class="fa fa-user-edit"></i> </a></td>
                       
                        </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                    </tbody>
                    </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


       <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Tambah User Baru</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?php 
                                $id = $this->uri->segment(3);
                          ?>
                         <form action="<?= base_url('data/useradmin/'.$id); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama user">
                                 </div>
                                 <div class="form-group">
                                     <select name="role_id" id="role_id" class="form-control">
                                         <option value="">Pilih Akses</option>
                                         <?php foreach ($role as $r) : ?>
                                             <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                 </div>
                                 <div class="form-group">
                                     <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password user">
                                 </div>
                                 <div class="form-group">
                                         <select name="is_active" id="is_active" class="form-control">
                                         <option>Status</option>
                                         <option value="1">Active</option>
                                         <option value="0">Inactive</option>
                                     </select>
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