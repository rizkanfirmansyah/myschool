             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="row">
                    <div class="col">
                     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <sup><i class="fas fa-clipboard-list"> Soal</i></sup></h1>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i> Tambah Soal</a>
                    </div>
                 </div>

                      <!-- FORM INPUT -->

                      
                 <div class="row">
                     <div class="card col-lg shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0  font-weight-bold text-primary"><?= $title;?></h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Nama Soal</th>
                                             <th>File Soal</th>
                                             <th>Bobot Soal</th>
                                             <th>Jawaban</th>
                                             <th>Dibuat Tanggal</th>
                                             <th>Terakhir Diubah</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>*</th>
                                             <th>Total</th>
                                             <th colspan="5"></th>
                                             <th></th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                        <?php $i=1; ?>   
                                        <?php foreach($soal as $s) : ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?= $s['soal']?></td>
                                                <td><img src="<?= base_url('assets/data/soal/'.$s['file_soal']) ?>" alt="" width="50" height="50"></td>
                                                <td><?= $s['bobot_nilai'] ?></td>
                                                <td><?= $s['jawaban'] ?></td>
                                                <td><?= $s['create_at'] ?></td>
                                                <td><?= $s['update_on'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('cbt/input/pagejawaban/'.$s['id']) ?>" class="btn btn-sm btn-success"> <i class="fas fa-clipboard-check"></i></a>
                                                    <a href="<?= base_url('cbt/delete/soal/'.$s['id'].'/'.$s['id_ujian']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    <a href="<?= base_url('cbt/update/pagesoal/'.$s['id'].'/'.$s['id_ujian']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('cbt/upload/pagejawaban/'.$s['id'].'/'.$s['id_ujian']) ?>" class="btn btn-sm btn-info"><i class="fas fa-upload"></i></a>
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

             
             <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content ">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Tambah <?= $title; ?> Baru</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?= form_open_multipart('cbt/input/soal/'.$this->uri->segment(4)); ?>
                             <div class="modal-body">
                                <div class="form-group">
                                    <label for="file" class="text-danger"> <sup>*</sup> Input Gambar jika perlu</label>
                                    <input type="file" class="form-control" name="imagefile" id="imagefile">
                                </div>
                                 <div class="form-group">
                                 <textarea id="summernote" name="editordata">
                                     Isi soal disini
                                 </textarea>
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


