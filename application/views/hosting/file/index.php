             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                
                <div class="row">
                    <div class="col">
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    </div>
                    <div class="col">
                            <a href="" class="text-primary float-right" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-folder-plus fa-2x"></i></a>
	                        <a href="" class="text-primary float-right" data-toggle="modal" data-target="#popUpFile"><i class="fas fa-fw fa-file-alt fa-2x"></i></a> 
                    </div>
                 </div>

                 <?= $this->session->flashdata('message'); ?>

                 <div class="row">
                     <div class="card col-md-12 shadow mb-4">
                         <div class="card-body">
                             <div class="table-responsive">
                                <!-- Table -->
                            <table class="table table-borderless" id="datatables2">
                                    <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Data</th>
                                      <th scope="col">Tanggal dibuat</th>
                                      <th scope="col">action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($folder as $f): ?>
                                    <tr>
                                      <th scope="row"><i class="fas fa-file-alt"></i></th>
                                      <td> <?= $f['file']; ?></td>
                                      <td style="color: #b3b3b3;">
                                        <?php 
                                        if (substr($f['file'], -4) == 'html') {
                                            $file ='application/views/hosting/user/'. $folder_name . '/' .$f['nama_folder'] . '/' . $f['file']; 
                                        } else {
                                            $file ='assets/hosting/'. $folder_name . '/' .$f['nama_folder'] . '/' . $f['file']; 
                                        }
                                        ?>
                                        <?= fsize($file); ?>
                                      </td>
                                      <td style="color: #b3b3b3;"><?= date('d-F-Y', $f['time']); ?></td>
                                      <td>
                                        <a href="<?= base_url('hosting/open/'.$f['nama_folder']); ?>" class="text-primary"><i class="fas fa-folder-open"></i></a>
                                        <a href="<?= base_url('hosting/editfile/'. $f['file']); ?>" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        <a href="" class="text-success"><i class="fas fa-check"></i></a>
                                        <a href="<?= base_url('hosting/hapusfile/'. $f['id']); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                      </td>
                                    </tr>
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


             <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Upload File</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?php 
                            $folder = $this->uri->segment(3);
                          ?>
                        <?= form_open_multipart('hosting/upload/'. $folder); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                            <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="files" name="files">
                                                  <label class="custom-file-label" for="file">Choose file</label>
                                                </div>
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
             <div class="modal fade" id="popUpFile" tabindex="-1" role="dialog" aria-labelledby="popUpFileLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpFileLabel">Create File</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?php 
                            $folder = $this->uri->segment(3);
                          ?>
                        <?= form_open_multipart('hosting/ufile/'. $folder); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                        <input type="text" name="file" id="file" placeholder="masukan nama file" class="form-control">
                                        <textarea name="text" id="text" cols="10" rows="15" class="form-control"></textarea>
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