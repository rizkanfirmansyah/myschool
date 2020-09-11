 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <!-- <a href="<?= base_url('guru') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-out-alt fa-sm text-white-50"></i> Kembali</a> -->
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Kelas" role="button" aria-expanded="false" aria-controls="Kelas">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkelas; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Materi" role="button" aria-expanded="false" aria-controls="Materi">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Materi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlmateri; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Tugas" role="button" aria-expanded="false" aria-controls="Tugas">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tugas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmltugas; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4"  type="button" data-toggle="collapse" data-target="#Absen" role="button" aria-expanded="false" aria-controls="Absen">
    <div class="card border-left-<?= warna_absen($absen['keterangan']) ?> shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-<?= warna_absen($absen['keterangan']) ?> text-uppercase mb-1">Absen Hari Ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $absen['keterangan'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-<?= icon_absen($absen['keterangan']) ?> fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


          <!-- <?= $title; ?> -->
          <div class="collapse" id="Kelas">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach($kelas as $k) :?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $k['nama_kelas'] ?></td>
                                    <td><?= hitung_siswa($k['id_kelas'])?></td>
                                    <td><a href="<?= base_url('guru/kelas/'.$k['id_kelas']) ?>" class="btn btn-sm btn-primary">Detail</a></td>
                                </tr>
                            <?php $i++;?>
                            <?php endforeach;?>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         
          <div class="collapse" id="Tugas">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tugas</h6>
            </div>
            <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h5 mb-0 text-gray-800">Data Materi</h1>
            <a type="button" class="btn btn-sm btn-primary ml-auto mx-1 text-white"><i class="fas fa-calendar fa-sm "></i> <?php date_default_timezone_set("Asia/Jakarta"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahTugas"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
            </div>
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                              <tr>
                                <td>No</td>
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Nama Tugas</td>
                                <td>KD</td>
                                <td>Deskripsi Tugas</td>
                                <td>Batas Pengumpulan</td>
                                <td>Download</td>
                                <td>File</td>
                                <td>Status</td>
                                <td>Action</td>
                              </tr>
                        </thead>
                            
                        <tbody>
                          <?php $i=1; ?>
                            <?php foreach($tugas as $t) : ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td><a href="<?= base_url('guru/tugas/kelas/'.$t['id_kelas']) ?>" class="btn btn-sm btn-primary"><?= $t['nama_kelas'];?></a></td>
                              <td><?= $t['nama_mapel'] ?></td>
                              <td><?= $t['nama_tugas'] ?></td>
                              <td><?= $t['kd'] ?></td>
                              <td><?= $t['deskripsi'] ?></td>
                              <td><?= $t['batas_waktu'] ?></td>
                              <td><a href="<?= base_url('download/tugas/'.$t['idtugas']) ?>" class="btn btn-primary btn-sm text-white"><i class="fas fa-download"></i> Download</a></td>
                              <td><a type="button" data-toggle="modal" data-target="#uploadTugas" class="btn btn-primary btn-sm text-white uploadDataTugas" id="uploadDataTugas" data-idtugas="<?= $t['idtugas'] ?>" data-tugas="<?= $t['nama_tugas'] ?>"><i class="fas fa-upload"></i> Upload</a></td>
                              <td><?= function_status_tugas($t['status_tugas'], $t['idtugas']) ?></td>
                              <td><a href="javascript:" class="btn btn-sm btn-primary detailDataTugas" data-id="<?= $t['idtugas'] ?>" data-tugas="<?= $t['nama_tugas'];?>" data-deskripsi="<?= $t['deskripsi'];?>" data-tanggal="<?= $t['batas_waktu'];?>" data-mapel="<?= $t['nama_mapel'];?>" data-toggle="modal" data-target="#detailTugas" id="detailDataTugas"><i class="fas fa-exclamation-circle"></i> Detail</a></td>
                            </tr>
                            <?php $i++;?>
                          <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         
          <div class="collapse" id="Materi">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Materi</h6>
            </div>
            <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h5 mb-0 text-gray-800">Data Materi</h1>
            <a type="button" class="btn btn-sm btn-primary ml-auto mx-1 text-white"><i class="fas fa-calendar fa-sm "></i> <?php date_default_timezone_set("Asia/Jakarta"); echo date('d-M-Y H:i').','.hari_function(date('D')) ;?></a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahMateri"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
          </div>
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Materi</th>
                            <th>Kelas</th>
                            <th>KD</th>
                            <th>Mata Pelajaran</th>
                            <th>Tanggal Dibuat</th>
                            <th>File</th>
                            <th>File Tugas</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                            
                        <tbody>
                        <?php $i=1; ?>
                        <?php foreach($materi as $m) : ?>
                          <tr>
                            <td><?= $i;?></td>
                            <td><?= $m['nama_materi'];?></td>
                            <td class="text-uppercase"><a href="<?= base_url('guru/materi/kelas/'.$m['id_kelas']) ?>" class="btn btn-sm btn-primary"><?= $m['nama_kelas'];?></a></td>
                            <td><?= $m['id_kd'];?></td>
                            <td><?= $m['nama_mapel'];?></td>
                            <td><?= $m['tgl'];?></td>
                            <td><?= $m['jmlfile'];?></td>
                            <td><a href="<?= base_url('download/materi/'.$m['idmateri']) ?>" class="btn btn-primary btn-sm text-white"><i class="fas fa-download"></i> Download</a></td>
                            <td><a type="button" data-toggle="modal" data-target="#uploadMateri" class="btn btn-primary btn-sm text-white uploadDataMateri" id="uploadDataMateri" data-idmateri="<?= $m['idmateri'] ?>" data-materi="<?= $m['nama_materi'] ?>"><i class="fas fa-upload"></i> Upload</a></td>
                            <td><?= function_status_materi($m['status_materi'], $m['idmateri']) ?></td>
                            <td><a href="javascript:" class="btn btn-sm btn-primary detailDataMateri" data-id="<?= $m['idmateri'] ?>" data-materi="<?= $m['nama_materi'];?>" data-deskripsi="<?= $m['deskripsi'];?>" data-tanggal="<?= $m['tgl'];?>" data-mapel="<?= $m['nama_mapel'];?>" data-toggle="modal" data-target="#detailMateri" id="detailDataMateri"><i class="fas fa-exclamation-circle"></i> Detail</a></td>
                          </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         
          <div class="collapse" id="Absen">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                              <?php $i=1;?>
                              <?php foreach($data1 as $absen):?>
                                <td><?= $i ?></td>
                                <td><?= $absen['nama'] ?></td>
                                <td><?= $absen['date'] ?></td>
                                <td><?= $absen['keterangan'] ?></td>
                              </tr>
                              <?php $i++?>
                              <?php endforeach;?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         

 </div>

 <?php $this->load->view('guru/materi/tambah_materi_modal.php') ?>