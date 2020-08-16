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
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">Database Menu Management</h6>
                         </div>
                         <div class="card-body ">
                             <div class="table-responsive">
                                   <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0" >
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>ID Komponen</th>
                                             <th>Nama Komponen</th>
                                             <th>Jumlah Baris</th>
                                             <th>Jumlah Code</th>
                                             <th>Tanggal Modifikasi</th>
                                             <th>Modifier</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>Total</th>
                                             <td colspan="2">
                                             	 <?php foreach ($komponen as $kom): ?>
                                             	 	<?= $kom['komponen']; ?><sup class="text-dark"><?= $kom['data']; ?></sup>
                                                             <?php
                                                                if ($kom['data_baris'] > 999999) {
                                                                    $dBaris= substr(number_format($kom['data_baris'],2,",","."), 0, 4)."M";
                                                                }elseif($kom['data_baris'] > 99999)
                                                                {
                                                                    $dBaris= substr(number_format($kom['data_baris'],2,",","."), 0, 3)."K";
                                                                }elseif ($kom['data_baris']>999){
                                                                    $dBaris= substr(number_format($kom['data_baris'],2,",","."), 0, 4)."K";
                                                                }else{
                                                                    $dBaris = $kom['data_baris'];
                                                                }

                                                                if ($kom['data_code'] > 999999) {
                                                                    $dCode= substr(number_format($kom['data_code'],2,",","."), 0, 4)."M";
                                                                }elseif($kom['data_code'] > 99999)
                                                                {
                                                                    $dCode= substr(number_format($kom['data_code'],2,",","."), 0, 3)."K";
                                                                }elseif ($kom['data_code']>999){
                                                                    $dCode= substr(number_format($kom['data_code'],2,",","."), 0, 4)."K";
                                                                }else{
                                                                    $dCode = $kom['data_code'];
                                                                }
                                                              ?>
                                                    (<?= $dBaris; ?>/<?= $dCode; ?>)
                                             	 <?php endforeach ?>
                                             </td>
                                    
                                             <?php foreach ($kalkulasi as $k): ?>
	                                             <th class=""><?= $k['jumlah_baris']; ?></th>
	                                             <th class=""><?= $k['jumlah_code']; ?></th>
                                             <?php endforeach ?>
                                             <th><?= date('d-M-Y H:i') ?></th>
                                             <th>Modifier</th>
                                             <th>NULL</th>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                         <?php $i = 1; ?>
                                         <?php foreach ($code as $sm) : ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= $sm['komponen']; ?> (<?= $sm['id_komponen']; ?>)</td>
                                                 <td><?= $sm['nama_komponen']; ?></td>
                                                 <td><?= $sm['jumlah_baris']; ?></td>
                                                 <td><?= $sm['jumlah_code']; ?></td>
                                                 <td><?= date('d-F-Y', $sm['time']); ?></td>
                                                 <td>
                                                     <?php if ($sm['modifier'] == 1): ?>
                                                         <span class="text-success">Normal</span> 
                                                     <?php else: ?>
                                                         <span class="text-warning">Maintanance</span>
                                                     <?php endif; ?>
                                                 </td>
                                                 <td>
                                                     <a href="<?= base_url('back/end/edit/') . $sm['id_id']; ?>" class="badge badge-warning">Edit</a>
                                                     <a href="<?= base_url('back/end/delete/') . $sm['id_id']; ?>" class="badge badge-danger">Delete</a>
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

             <!-- Modal -->

             <!-- Modal -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Kalkulasi Data Backend</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('back/end/add/addcodebackend'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" placeholder="Masukkan nama komponen">
                                 </div>
                                 <div class="form-group">
                                     <select name="id_komponen" id="id_komponen" class="form-control">
                                         <option value="">Pilih Komponen</option>
                                         <?php foreach ($tb_code as $m) : ?>
                                             <option class="text-capitalize" value="<?= $m['id']; ?>"><?= $m['komponen']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="jumlah_baris" name="jumlah_baris" placeholder="Masukkan Jumlah Baris">
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id="jumlah_code" name="jumlah_code" placeholder="Masukkan Jumlah Code">
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