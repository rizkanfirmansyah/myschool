             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <sup><i class="fas fa-edit"> Edit</i></sup></h1>

                      <!-- FORM INPUT -->

                      <?= form_open('cbt/update/ujian/'.$ujian['idujian']); ?>
                             <div class="modal-body">
                             <div class="form-row mb-3">
                                     <div class="col-sm-8">
                                        <input type="text" name="ujian" id="ujian" class="form-control" placeholder="Masukan judul ujian..." value="<?= $ujian['nama_ujian'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" min="1" max="100" name="kkm" id="kkm" class="form-control" placeholder="Masukan KKM ujian..." required value="<?= $ujian['kkm'] ?>">
                                        </div>
                                 </div> 
                                 <div class="form-group">
                                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" value="<?= $ujian['deskripsi_ujian'] ?>"><?= $ujian['deskripsi_ujian'] ?></textarea>
                                 </div> 
                                 <div class="form-group">
                                    <select name="mapel" id="mapel" class="form-control">
                                    <option value="<?= $ujian['id_mapel'] ?>" selected><?= $ujian['nama_mapel'] ?></option>
                                        <?php foreach($mapel as $m) : ?>
                                        <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                 </div>
                                 <div class="form-row">
                                    <div class="col">
                                        <label for="awal">Masukkan waktu awal ujian</label>
                                        <input type="datetime-local" class="form-control" placeholder="Waktu Awal" name="awal" id="awal" value="<?= $ujian['mulai_at'] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="akhir">Masukkan waktu akhir ujian</label>
                                        <input type="datetime-local" class="form-control" placeholder="Waktu Akhir" name="akhir" id="akhir" value="<?= $ujian['akhir_at'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                 <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                             </div>
                         </form>
 

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->