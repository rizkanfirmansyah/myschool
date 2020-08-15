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
                         <div class="card-body">
                             <div class="table-responsive">
                                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>Bab</th>
                                             <th>IDP</th>
                                             <th>Tugas</th>
                                             <th>Tugas</th>
                                             <th>Batas Waktu </th>
                                             <th>Waktu</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="4"></th>
                                             <th></th>
                                         </tr>
                                     </tfoot>
                            <?php $i=1; ?>
                                <?php foreach($tugas as $t) : ?>
                                     <tbody>
                                            <td><?= $t['bab']; ?></td>
                                            <td><?= $t['id_pengajar']; ?></td>
                                            <td><?= $t['tugas']; ?></td>
                                            <td class="text-center">
                                            <?php if($t['jenis_file'] == 'video') : ?>
                                                <a href="<?= $t['file']; ?>" class="text-secondary">
                                                    <i class="fab text-danger fa-fw fa-youtube"></i>
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= base_url('download/tugas/') .$t['file']; ?>" class="text-secondary">
                                                    <i class="fas text-primary fa-fw fa-file"></i>
                                                </a>
                                            <?php endif; ?>
                                            </td>
                                            <td><?= $t['batas_waktu']; ?></td>
                                            <td><?= $t['time']; ?> Minggu</td>
                                            <td>
                                                <a href="<?= base_url('hapus/tugas/') . $t['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini? Klik OK untuk melanjutkan.');"><i class="fas fa-fw fa-trash-alt"></i></a>
                                                <a href="<?= base_url('edit/tugas/') . $t['id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                            </td>
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
                             <h5 class="modal-title" id="popUpLabel">Tambah Pengajar <?= $title; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?= form_open_multipart('input/tugas'); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="tugas" name="tugas" placeholder="Nama tugas">
                                 </div> 
                                 <div class="form-group">
                                     <select class="form-control" id="bab" name="bab">
                                        <?php foreach($materi as $m) : ?>
                                            <option value="<?= $m['bab']; ?>"><?= $m['materi']; ?></option>
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
                                            <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="file" name="file">
                                                  <label class="custom-file-label" for="file">Input File Soal</label>
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


