      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-primary ml-auto mx-1"><i class="fas fa-calendar fa-sm text-white-50"></i> <?php date_default_timezone_set("Asia/Bangkok"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <!-- <a href="<?= base_url('format/jadwal'); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash fa-sm text-white-50"></i> Format</a> -->
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fas fa-box-open fa-sm text-white"></i> Barang Masuk</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fas fa-box fa-sm text-white"></i> Barang Keluar</a>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pembelian; ?> </div>
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
            <a href="<?= base_url('inventaris/barang/unit/unit_barang') ?>" style="text-decoration: none;">
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
            <a href="<?= base_url('inventaris/barang/merk/merk_barang') ?>" style="text-decoration: none;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Merk Barang</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tools fa-2x text-gray-300"></i>
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
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                      <?php foreach($data as $pembelian) :?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$pembelian['id_nota']?></td>
                            <td><?=$pembelian['nama_barang']?></td>
                            <td><?=$pembelian['harga']?></td>
                            <td><?=$pembelian['jumlah_barang']?></td>
                            <td><?=$pembelian['total_harga']?></td>
                            <td><?=$pembelian['jenis_pembelian']?></td>
                            <td>
                                <a href="#" onclick="detailPembelian(<?=$pembelian['id_nota']?>)" class="badge badge-large badge-primary"><i class="fas fa-exclamation"></i> Detail</a>        
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
<div class="modal fade right" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


<div class="modal fade right" id="btnEditData" tabindex="-1" role="dialog" aria-labelledby="editDataLabel"
      aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content ">
          <!--Header-->
          <div class="modal-header">
            <span class="heading lead">Edit Data Barang 
                </span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

          <!--Body-->
          <div class="modal-body">
            <!--Basic textarea-->
            <form action="<?= base_url('edit/barang') ?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="barang">Edit data barang</label>
                <input type="text" name="nama_barang" id="namaBarangData" class="form-control">
                <input type="hidden" name="id_barang" id="idBarangData" class="form-control">
                </div>
                <input type="hidden" name="status" value="1">
             </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="barang">Jenis barang</label>
                <input disabled type="text" name="jenis_barang" id="jenisBarangData" class="form-control">
                </div>
             </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="barang">Merk barang</label>
                <input disabled type="text" name="merk_barang" id="merkBarangData" class="form-control">
                </div>
             </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="barang">Satuan barang</label>
                <input disabled type="text" name="unit_barang" id="satuanBarangData" class="form-control">
                </div>
             </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="barang">Harga data barang</label>
                <input type="number" name="harga" id="hargaBarangData" class="form-control">
                </div>
             </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

          <!--Footer-->
      </div>
    </div>
    <!-- Modal: user -->


