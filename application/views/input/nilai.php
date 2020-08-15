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
                          <div class="card-header py-3 row">
                            <div class="col">
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
                            </div>
                            <div class="col">
                             <h6 class="m-0 float-right font-weight-bold text-primary"><?= $user['name']; ?></h6>
                            </div>
                         </div>
                         <div class="card-body" >
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>Bab</th>
                                             <th>Nama</th>
                                             <th>tugas</th>
                                             <th>Tugas</th>
                                             <th>Status </th>
                                             <th>Nilai </th>
                                             <th>Pengumpulan</th>
                                             <th>Deadline</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="6"></th>
                                             <th></th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                     <?php $i=1; ?>
                                     <?php foreach ($tugas as $t ) :?>
                                        <tr>
                                            <td><?= $t['bab']; ?></td>
                                            <td><?= $t['name']; ?></td>
                                            <td><?= $t['tugas']; ?></td>
                                            <td class="text-center">
                                                <?php if ($t['jenis_file'] == 'file'): ?>
                                                    <?php if (empty($t['file'])): ?>
                                                        <i class="fas fa-fw fa-file"></i>
                                                    <?php else: ?>
                                                        <a href="" class="text-primary"><i class="fas fa-fw fa-file"></i></a>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <?php if (empty($t['file'])): ?>
                                                        <i class="fab fa-fw fa-youtube"></i>
                                                    <?php else: ?>
                                                        <a href="" class="text-danger"><i class="fab fa-fw fa-youtube"></i></a>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($t['status'] == 1): ?>
                                                    <a class="text-success"><i class="fas fa-fw fa-check"></i></a>
                                                <?php elseif ($t['status'] == 2) : ?>
                                                    <a class="text-warning"><i class="fas fa-fw fa-hourglass-half"></i></a>
                                                <?php else: ?>
                                                    <a class="text-danger"><i class="fas fa-fw fa-times-circle"></a></i>
                                                <?php endif ?>
                                            </td>
                                            <td><?= $t['nilai']; ?></td>
                                            <td><?= $t['waktu']; ?></td>
                                            <td><?= $t['deadline']; ?></td>
                                            <td>
                                                <a href="<?= base_url('akses/nilai/') . $t['id'] . '/' . $t['name']; ?>" class=" text-success"><i class="fas fa-fw fa-check"></i></a>
                                                <a href="" class=" text-danger"><i class="fas fa-fw fa-trash"></i></a>
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
             <!-- container-fluid -->

             </div>
             <!-- End of Main Content -->

                  <!-- Modal -->

             <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('input/tugas'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <select class="form-control" id="materi" name="materi">
                                        <?php foreach($materi as $m) : ?>
                                            <option value="<?= $m['materi']; ?>"><?= $m['materi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                 </div> 
                                 <div class="form-group">
                                     <input type="number" class="form-control" id="waktu" name="waktu" placeholder="waktu tugas">
                                 </div> 
                                 <div class="form-group">
                                     <input type="date" class="form-control" id="date" name="date" placeholder="waktu tugas">
                                 </div> 
                                 <div class="form-group">
                                     <select class="form-control" id="jenis_file" name="jenis_file">
                                      <option value="video">Video</option>
                                      <option value="file">File</option>
                                    </select>
                                 </div> 
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="file" name="file" value="" placeholder="Masukan URL file/video">
                                 </div> 
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="id_pengajar" name="id_pengajar" value="<?= $t['id_pengajar']; ?>" placeholder="Jangka waktu materi">
                                 </div>
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="pengajar" name="pengajar" value="<?= $t['nama_pengajar']; ?>" placeholder="Jangka waktu materi">
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


