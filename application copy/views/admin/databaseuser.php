 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?php if (validation_errors()) : ?>
                    <div class="alert mb-0 mt-0"><i class="fas fa-exclamation-triangle float-left mt-1 mr-1"> </i> Error Found!</div>
                    <div class ="alert alert-danger" role = "alert">
                    <?= validation_errors(); ?>
                    </div>
            <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>


               <div class="row">
                    <div class="col-md-6">
                        <?= $this->session->flashdata('message'); ?>
                                <div class="card shadow mb-4">  
                                    <div class="card-header py-3">
                                        <div class="row">
                                            <div class="col-md-10">
                                             <h6 class="m-0 font-weight-bold text-primary">Database user IT Club</h6>
                                            </div>
                                            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                                                    <div class="col-md-2 float-right">
                                                         <a href="" class="badge badge-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                                    </div>
                                                <?php else: ?>
                                                <?php endif ?>
                                            </div>
                                         </div>
                    <div class="card-body">
                         <div class="row tabel center">
                                        <?php if ($this->session->userdata('tabel') == 'table'): ?>
                                             <table class="table table-borderless" id="datatables2" width="100%" cellspacing="0">
                                        <?php else: ?>
                                             <table class="table table-borderless" id="datatables" width="100%" cellspacing="0">
                                        <?php endif ?>
                                <thead>
                                  <th>No</th>
                                  <th>Nama User</th>
                                  <th></th>
                                  <th></th>
                                </thead>
                                  <tbody>
                                <?php $i=1; ?>
                                    <?php foreach ($User as $us): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $us['role']; ?></td>
                                            <td><?= $us['total']; ?></td>
                                            <td><a href="<?= base_url('admin/datauser/'); ?><?= $us['role_id']; ?>" class="badge badge-primary"><i class="fas fa-folder-open"></i> Open Folder</a></td>
                                        </tr>
                                         <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
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
                         <form action="<?= base_url('data/user'); ?>" method="post">
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
                                         <option value="0">Status</option>
                                         <option value="1">Active</option>
                                         <option value="2">Inactive</option>
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
