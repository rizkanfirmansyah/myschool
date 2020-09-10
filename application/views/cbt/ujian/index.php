             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#popUp"><i class="fas fa-fw fa-plus"></i> Tambah Ujian</a>
                    </div>
                 </div>

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
                                                    <?= ujian_status($u['active'], $u['idujian']) ?>
                                                    <a href="<?= base_url('cbt/delete/ujian/'.$u['idujian']) ?>" class="badge badge-danger"> <i class="fas fa-trash"></i></a>
                                                    <a href="<?= base_url('cbt/update/pageujian/'.$u['idujian']) ?>" class="badge badge-warning"> <i class="fas fa-edit"></i></a>
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
             <!-- container-fluid -->

             </div>
             <!-- End of Main Content -->

                  <!-- Modal -->

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
                         <?= form_open('cbt/input/ujian'); ?>
                             <div class="modal-body">
                                 <div class="form-group">
                                    <input type="text" name="ujian" id="ujian" class="form-control" placeholder="Masukan judul ujian..." required minlength="10">
                                 </div> 
                                 <div class="form-group">
                                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" required minlength="100">Masukan deskripsi soal</textarea>
                                 </div> 
                                 <div class="form-row">
                                     <div class="col">
                                         <select name="mapel" id="mapel" class="form-control" required>
                                             <option value="" selected disabled> == Pilih Mapel == </option>
                                             <?php foreach($mapel as $m) : ?>
                                             <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class="col">
                                     <select name="tipe" id="tipe" class="form-control" required>
                                             <option value="" selected disabled> == Pilih Tipe Ujian == </option>   
                                             <?php foreach($data1 as $tipe) : ?>
                                                 <option value="<?= $tipe['id_tipe_ujian'] ?>"><?= $tipe['tipe_ujian'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="col">
                                        <label for="awal">Masukkan waktu awal ujian</label>
                                        <input type="datetime-local" class="form-control" placeholder="Waktu Awal" name="awal" id="awal" required>
                                    </div>
                                    <div class="col">
                                        <label for="akhir">Masukkan waktu akhir ujian</label>
                                        <input type="datetime-local" class="form-control" placeholder="Waktu Akhir" name="akhir" id="akhir" required>
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


