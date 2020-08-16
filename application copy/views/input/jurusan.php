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
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
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
                                         <a href="" class="btn btn-primary text-right float-right mb-3" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i></a>
                                    </div>
                                </div>
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
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
                                                     <a href="<?= base_url('edit/list/') . $m['id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                     <a href="<?= base_url('hapus/list/') . $m['id']; ?>" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
                                                     <a href="<?= base_url('input/list/') . $m['tingkatan'] ; ?>" class="badge badge-primary"><i class="fas fa-fw fa-folder-open"></i></a>
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


