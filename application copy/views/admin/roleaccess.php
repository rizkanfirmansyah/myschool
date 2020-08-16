             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                 <div class="row">
                     <div class="col-lg-6">

                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-lg-6 shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0  font-weight-bold text-primary">Pengaturan Akses Role</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <h5>Role : <?= $role['role']; ?></h5>
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Menu</th>
                                             <th>Akses</th>
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
                                                     <div class="form-check">
                                                         <input class="form-check-input" type="checkbox" name="exampleRadios" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                     </div>
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