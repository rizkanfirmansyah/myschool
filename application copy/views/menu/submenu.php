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
                             <h6 class="m-0  font-weight-bold text-primary">Database Menu Management</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                   <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Title Submenu</th>
                                             <th>Name Menu</th>
                                             <th>URL</th>
                                             <th>Icon</th>
                                             <th>Active</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="4"></th>
                                             <th class="text-center">4</th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                         <?php $i = 1; ?>
                                         <?php foreach ($submenu as $sm) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $sm['title']; ?></td>
                                                 <td><?= $sm['menu']; ?></td>
                                                 <td><?= $sm['url']; ?></td>
                                                 <td><i class="<?= $sm['icon']; ?>"></i></td>
                                                 <td>
                                                    <?php if($sm['is_active'] == 1): ?>    
                                                        <p style="color: green;">Active</p>
                                                    <?php else: ?>
                                                        <p style="color: red;">Inactive</p>
                                                    <?php endif; ?>
                                                 </td>
                                                 <td>
                                                     <a href="<?= base_url('menu/editsubmenu/') . $sm['id']; ?>" class="badge badge-warning">Edit</a>
                                                     <a href="<?= base_url('hapus/submenu/') . $sm['id']; ?>" class="badge badge-danger">Delete</a>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah Subtitution Menu</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('menu/submenu'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan nama submenu">
                                 </div>
                                 <div class="form-group">
                                     <select name="menu_id" id="menu_id" class="form-control">
                                         <option value="">Pilih Menu</option>
                                         <?php foreach ($menu as $m) : ?>
                                             <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan nama URL">
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan nama Icon">
                                 </div>
                                 <div class="form-group">
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                         <label class="form-check-label" for="is_active">
                                             Aktifkan
                                         </label>
                                     </div>
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