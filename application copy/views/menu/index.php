             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                 <div class="row">
                     <div class="col-lg-6">
                         <?= form_error(
                                'menu',
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        					</div>'
                                    ); ?>

                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-lg-6 shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0  font-weight-bold text-primary">Database Menu Management</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                    <div class="row">
                                    <div class="col-sm-10 float-left">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" id="cari" name="cari" placeholder="Cari Member.." class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                 <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 float-right">
                                         <a href="" class="btn btn-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                    </div>
                                </div>
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Name Menu</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th class="text-center">4</th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                         <?php $i = 1; ?>
                                         <?php foreach ($menu as $m) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $m['menu']; ?></td>
                                                 <td>
                                                     <a href="<?= base_url('menu/editmenu/') . $m['id']; ?>" class="badge badge-warning">Edit</a>
                                                     <a href="<?= base_url('menu/deletemenu/') . $m['id']; ?>" class="badge badge-danger">Delete</a>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah Menu</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('menu'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan nama menu">
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