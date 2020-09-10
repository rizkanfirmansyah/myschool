      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-primary ml-auto mx-1"><i class="fas fa-calendar fa-sm text-white-50"></i> <?php date_default_timezone_set("Asia/Bangkok"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <!-- <a href="<?= base_url('format/jadwal'); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash fa-sm text-white-50"></i> Format</a> -->
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= base_url('inventaris/barang/jenis/jenis_barang') ?>" style="text-decoration: none;">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Jenis Barang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= hitung_jumlah('jenis_barang') ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
                
            <!-- Data lengkap Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('inventaris/barang/unit/unit_barang') ?>" style="text-decoration: none;">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Satuan Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= hitung_jumlah('unit_barang') ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-store fa-2x text-gray-300"></i>
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
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?= hitung_jumlah('merk_barang') ?> </div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= hitung_jumlah('barang') ?> </div>
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
              <h6 class="m-0 font-weight-bold text-primary"> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Barang</th>
                      <th>Jenis Barang</th>
                      <th>Merk Barang</th>
                      <th>Satuan Barang</th>
                      <th>Harga Barang</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1?>
                      <?php foreach($table as $barang) :?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $barang['nama_barang'] ?></td>
                            <td><?= $barang['nama_jenis'] ?></td>
                            <td><?= $barang['nama_merk'] ?></td>
                            <td><?= $barang['nama_unit'] ?></td>
                            <td><?= $barang['harga'] ?></td>
                            <td><?= status($barang['status']) ?></td>
                            <td>
                            <a href="#" data-id="<?= $barang['id_barang'] ?>" data-barang="<?= $barang['nama_barang'] ?>" data-merk="<?= $barang['nama_merk'] ?>" data-jenis="<?= $barang['nama_jenis'] ?>" data-unit="<?= $barang['nama_unit'] ?>" data-harga="<?= $barang['harga'] ?>" data-toggle="modal" id="btnBarang" data-target="#btnEditData" class="text-warning"><i class="fas fa-edit"></i></a>
                             <a href="<?= base_url('hapus/barang/'.$barang['id_barang'].'/'.$barang['nama_barang']) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                      <?php $i++?>
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
        <span class="heading lead">Tambah Data Barang
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

      <!--Body-->
      <div class="modal-body">
        <!--Basic textarea-->
        <form action="<?= base_url('input/barang') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="nama_barang">Nama Barang</label>
              <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            </div>
        </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="merk" class="text-capitalize">merk</label>
            <select id="merk_barang" name="merk_barang" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih merk== </option>
                <?php foreach($merk as $m):?>
                  <option class="text-capitalize" value="<?= $m['id_merk'];?>"><?= $m['nama_merk'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
          <div class="form-group col-md-6">
            <label for="unit" class="text-capitalize">satuan</label>
            <select id="unit_barang" name="unit_barang" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih unit== </option>
                <?php foreach($unit as $m):?>
                  <option class="text-capitalize" value="<?= $m['id_unit'];?>"><?= $m['nama_unit'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="jenis" class="text-capitalize">jenis</label>
            <select id="jenis_barang" name="jenis_barang" class="form-control text-capitalize">
                <option selected disabled value=""> ==Pilih jenis== </option>
                <?php foreach($jenis as $m):?>
                  <option class="text-capitalize" value="<?= $m['id_jenis'];?>"><?= $m['nama_jenis'] ?></option>
                <?php endforeach;?>
              </select>
            </div>
          <div class="form-group col-md-6">
            <label for="harga" class="text-capitalize">harga</label>
            <input type="number" name="harga" id="harga" min="1" max="9999999" class="form-control" placeholder="20000">
            <input type="hidden" name="status" id="status" value="1" class="form-control">
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


