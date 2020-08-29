             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                      <!-- FORM INPUT -->

                      
                 <div class="row">
                     <div class="card col-lg shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title; ?> Management</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Mapel</th>
                                             <th>Nama Ujian</th>
                                             <th>Deskripsi Ujian</th>
                                             <th>Kode Ujian</th>
                                             <th>Dibuat Tanggal</th>
                                             <th>Mulai Ujian</th>
                                             <th>Selesai Ujian</th>
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
                                        <?php foreach($ujian as $u) : ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?= $u['nama_mapel']?></td>
                                                <td><?= $u['nama_ujian'] ?></td>
                                                <td><?= $u['deskripsi_ujian'] ?></td>
                                                <td><?= base64_decode($u['auth_key']) ?></td>
                                                <td><?= $u['create_at'] ?></td>
                                                <td><?= $u['mulai_at'] ?></td>
                                                <td><?= $u['akhir_at'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('cbt/input/pagesoal/'.$u['idujian']) ?>" class="btn btn-sm btn-info"> <i class="fas fa-clipboard-list"></i></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php $i++;?>   
                                        <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->