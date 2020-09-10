      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-primary ml-auto mx-1"><i class="fas fa-calendar fa-sm text-white-50"></i> <?php date_default_timezone_set("Asia/Bangkok"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <!-- <a href="<?= base_url('format/jadwal'); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash fa-sm text-white-50"></i> Format</a> -->
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#pembelianTransaksi"><i class="fas fa-box-open fa-sm text-white"></i> Barang Masuk</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#pengeluaranTransaksi"><i class="fas fa-box fa-sm text-white"></i> Barang Keluar</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- <a href="<?= base_url('inventaris/barang/jenis/jenis_barang') ?>" style="text-decoration: none;"> -->
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Pembelian Barang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pembelian; ?>x </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-box-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                </div>
                
            <!-- Data lengkap Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('inventaris/gudang') ?>" style="text-decoration: none;">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Gudang Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            
            <!-- Data Guru Sertifikasi Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran Barang</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pengeluaran ?>x  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

          <!-- Data Kelas -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Catatan Inventaris </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nota</th>
                      <th>Nama Barang</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Barang</th>
                      <th>Total Harga</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tablePembelian">
                      <?php $i=1;?>
                      <?php foreach($data as $pembelian) :?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$pembelian['id_nota']?></td>
                            <td><?=$pembelian['nama_barang']?></td>
                            <td><?=$pembelian['harga']?></td>
                            <td><?=$pembelian['jumlah_barang']?></td>
                            <td><?=$pembelian['total_harga']?></td>
                            <td><?= date('d-M-Y', strtotime($pembelian['tanggal']))?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modalDetailPembelian" data-nota="<?=$pembelian['id_nota']?>" id="btnDetailNota" class="badge badge-large badge-primary"><i class="fas fa-exclamation"></i> Detail</a>        
                        </td>
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

<!-- Modal: Jadwal -->
<div class="modal fade right" id="pembelianTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog  modal-lg modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content ">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Input Pembelian Barang
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/transaksi') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_barang">Nama Barang</label>
            <select name="id_barang" id="id_barang" class="form-control" onchange="getval(this)">
                <option value="" selected disabled >== Pilih Barang ==</option>
                <?php foreach($table as $t) : ?>
                    <option value="<?= $t['id_barang'] ?>"><?= $t['nama_barang'] ?></option>
                 <?php endforeach; ?>
            </select>    
          </div>
          <div class="form-group col-md-6">
            <label for="id_nota">Nota Barang</label> 
                <input type="text" name="id_nota" id="id_nota" value="" readonly class="form-control">
                <input type="hidden" name="jenis_pembelian" id="jenis_pembelian" value="pembelian" class="form-control">
          </div>
        </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="merk" class="text-capitalize">merk</label>
            <input type="text" id="merk_barang" readonly class="form-control">
        </div>
          <div class="form-group col-md-6">
            <label for="unit" class="text-capitalize">satuan</label>
            <input type="text" id="unit_barang" readonly class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tipe" class="text-capitalize">jenis</label>
            <input type="text" id="tipe_barang" readonly class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="harga" class="text-capitalize">harga</label>
            <input type="number" class="form-control" id="harga" readonly>
        </div>
    </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="pajak" class="text-capitalize">pajak</label>
            <input type="number" min="0" max="100" name="pajak" id="pajak_barang" class="form-control">
        </div>
          <div class="form-group col-md-6">
            <label for="diskon" class="text-capitalize">diskon</label>
            <input type="number" class="form-control" name="diskon" id="diskon" min="0" max="100">
        </div>
    </div>
    <div class="form-row">
          <div class="form-group col-md-6">
              <label for="jenis" class="text-capitalize">jumlah barang</label>
              <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" onchange="getharga(this)">
            </div>
            <div class="form-group col-md-6">
                <label for="total_harga" class="text-capitalize">total harga</label>
                <input type="number" class="form-control" name="total_harga" id="total_harga" readonly>
            </div>
        </div>
        <input type="hidden" name="status" id="status" value="1" class="form-control">
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>

      <!--Footer-->
  </div>
</div>
</div>
</div>
<!-- Modal: user -->

<!-- Modal: Jadwal -->
<div class="modal fade right" id="pengeluaranTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog  modal-lg modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content ">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Input Pengeluaran Barang
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/output') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_barang">Nama Barang</label>
            <select name="id_barang" class="form-control" onchange="getval(this)">
                <option value="" selected disabled >== Pilih Barang ==</option>
                <?php foreach($table as $t) : ?>
                    <option value="<?= $t['id_barang'] ?>"><?= $t['nama_barang'] ?></option>
                 <?php endforeach; ?>
            </select>    
          </div>
          <div class="form-group col-md-6">
              <label for="jenis" class="text-capitalize">jumlah barang</label>
              <input type="number" name="jumlah_barang" class="form-control" >
            </div>
            <div class="form-group col-md-12">
                <label for="keterangan" class="text-capitalize">Keterangan</label>
                <input type="text" class="form-control" name="keterangan">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>

      <!--Footer-->
  </div>
</div>
</div>
</div>
<!-- Modal: user -->



<!-- Modal -->
<div class="modal fade" id="modalDetailPembelian" tabindex="-1" role="dialog" aria-labelledby="modalDetailPembelianLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"  style="margin-bottom: -30px;">
    <!-- <div class="modal-content"> -->
    <ul class="list-group" id="dataListNota">
      
      </ul>
            <!-- </div> -->
  </div>
</div>


