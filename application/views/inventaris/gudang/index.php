      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-primary ml-auto mx-1"><i class="fas fa-calendar fa-sm text-white-50"></i> <?php date_default_timezone_set("Asia/Bangkok"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <!-- <a href="<?= base_url('format/jadwal'); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash fa-sm text-white-50"></i> Format</a> -->
          </div>
          
          <!-- Data Kelas -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title ?> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Barang</th>
                      <th>Tipe Barang</th>
                      <th>Merk Barang</th>
                      <th>Satuan Barang</th>
                      <th>Harga Satuan</th>
                      <th>Sisa Barang</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody id="tablePembelian">
                      <?php $i=1;?>
                      <?php foreach($data as $pembelian) :?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$pembelian['nama_barang']?></td>
                            <td><?=$pembelian['nama_jenis']?></td>
                            <td><?=$pembelian['nama_merk']?></td>
                            <td><?=$pembelian['nama_unit']?></td>
                            <td><?=$pembelian['harga']?></td>
                            <td><?=sisaBarang($pembelian['id_barang'])?></td>
                            <!-- <td> -->
                                <!-- <a href="#" data-toggle="modal" data-target="#modalDetailPembelian" data-nota="<?=$pembelian['id_nota']?>" id="btnDetailNota" class="badge badge-large badge-primary"><i class="fas fa-exclamation"></i> Detail</a>         -->
                        <!-- </td> -->
                        </tr>
                      <?php $i++;?>
                     <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- SCRIPT INCLUDE INTERNAL -->
        </div>
        </div>
        </div>

