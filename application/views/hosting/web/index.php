             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                
                <div class="row">
                    <div class="col">
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                         <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="col">
                    	<?php if (empty($ufolder)): ?>
	                        <a href="" class="text-primary float-right" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-user-plus fa-2x"></i></a>
                    	<?php else: ?>
	                        <a href="" class="text-primary float-right" data-toggle="modal" data-target="#popUpu"><i class="fas fa-fw fa-folder-plus fa-2x"></i></a>
                    	<?php endif ?>
                    </div>
                 </div>

                 <?php if (empty($ufolder)): ?>
                 	<div class="row">
                 		<div class="col text-center">
		                 	<span class="text-secondary">Tidak ada data</span>
                 		</div>
                 	</div>
                 <?php else: ?>

                <div class="row">
                     <div class="card col-md-12 shadow mb-4">
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-borderless" id="datatables2">
                                    <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Data</th>
                                      <th scope="col">Tanggal dibuat</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($folder as $f): ?>
                                    <tr>
                                      <th scope="row"><i class="fas fa-folder"></i></th>
                                      <td> <?= $f['folder']; ?></td>
                                      <td style="color: #b3b3b3;"><?= $f['jumlah']; ?> File 
                                        <?= byte_format((get_directory_size('application/views/hosting/user/'. $folder_name . '/' .$f['folder']) ) + (get_directory_size('assets/hosting/'. $folder_name . '/' .$f['folder']) ), 2) ; ?> 
                                      </td>
                                      <td style="color: #b3b3b3;"><?= date('d-F-Y', $f['time']); ?></td>
                                      <td>
                                          <?php if ($f['is_active'] == 1): ?>
                                              <a class="text-success">Running</a>
                                          <?php else: ?>
                                              <a class="text-danger">Suspended</a>
                                          <?php endif ?>
                                      </td>
                                      <td>
                                        <a href="<?= base_url('hosting/open/'.$f['folder']. '/'); ?>" class="text-primary"><i class="fas fa-folder-open"></i></a>
                                        <a href="<?= base_url('hosting/editfolder/'. $f['id']); ?>" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('hosting/status/'. $f['id'] . '/' .$f['is_active']); ?>" class="text-success"><i class="fas fa-check"></i></a>
                                        <a href="<?= base_url('hosting/hapusfolder/'. $f['folder']); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        <?php if ($f['file'] == 'index.html'): ?>
                                             <a href="<?= base_url('itwebhost/index/'.$f['folder']); ?>" class="text-warning"><i class="fas fa-file-alt"></i></a>
                                        <?php else: ?>
                                            <a class="text-secondary"> <i class="fas fa-file-alt"></i></a>
                                        <?php endif ?>
                                      </td>
                                    </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>    
                                 <?php endif; ?>
                             </div>
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
                             <h5 class="modal-title" id="popUpLabel">Buat akun hosting</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('hosting/ufolder'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="folder" name="folder" value="<?= $user['name']; ?>" placeholder="Masukkan nama folder">
                                 </div>
                                 <div class="form-group">
                                     <input type="hidden" class="form-control" id="nilai" name="nilai" value="1" placeholder="Masukkan nama nilai">
                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">Buat</button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             
             <!-- Modal -->
             <div class="modal fade" id="popUpu" tabindex="-1" role="dialog" aria-labelledby="popUpuLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Create Folder</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('hosting/ufolder'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="folder" name="folder" value="<?= $user['name']; ?>" placeholder="Masukkan nama folder">
                                 </div>
                                     <input type="hidden" class="form-control" id="nilai" name="nilai" value="2">
                             </div>
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">Buat</button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>