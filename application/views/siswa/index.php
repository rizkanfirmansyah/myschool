
<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <a href="#" data-toggle="modal" data-target="#kumpulkanTugas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Kumpulkan Tugas</a>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['nama_kelas'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jurusan</div>
            <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $siswa['nama_jurusan'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-archway fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Angkatan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['angkatan_nama'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Absen Siswa -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-<?= warna_absen($absen['keterangan']) ?> shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-<?= warna_absen($absen['keterangan']) ?> text-uppercase mb-1">Absen Hari ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $absen['keterangan'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-<?= icon_absen($absen['keterangan'] ) ?> fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>




<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" data-toggle="collapse" data-target="#Materi" role="button" aria-expanded="false" aria-controls="Materi">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Materi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlmateri; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4"  data-toggle="collapse" data-target="#Tugas" role="button" aria-expanded="false" aria-controls="Tugas">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tugas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $jmltugas; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-tasks fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4"  data-toggle="collapse" data-target="#Ujian" role="button" aria-expanded="false" aria-controls="Ujian">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Ujian</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $jmlUjian; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-table fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </div>

</div>


      <!-- COLLAPSE -->

      <div class="collapse" id="Materi">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered table-sm" id="datatable2" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Mapel</td>
                            <td>Guru Mapel</td>
                            <td>Nama Materi</td>
                            <td>Deskripsi</td>
                            <td>File</td>
                            <td>Selesai</td>
                          </tr>    
                        </thead>
                            
                        <tbody>
                          <?php $i=1;?>
                          <?php foreach($materi as $m) : ?>
                            <tr>
                              <td><?= $i;?></td>
                              <td><?= $m['nama_mapel']?></td>
                              <td><?= $m['nama'] ?></td>
                              <td><?= $m['nama_materi'] ?></td>
                              <td><?= $m['deskripsi'] ?></td>
                              <td><a href="<?= base_url('download/materi/'.$m['idmateri']) ?>" class="btn btn-primary btn-sm text-white"><i class="fas fa-download"></i> Download</a></td>
                              <td class="text-center">
                                <?= checked_materi_siswa($m['idmateri']) ?>
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



      <div class="collapse" id="Tugas">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Mapel</td>
                            <td>Guru Mapel</td>
                            <td>Nama Tugas</td>
                            <td>Deskripsi</td>
                            <td>File</td>
                            <td>Deadline</td>
                            <td>Selesai</td>
                          </tr>    
                        </thead>
                            
                        <tbody>
                          <?php $i=1;?>
                          <?php foreach($tugas as $m) : ?>
                            <tr>
                              <td><?= $i;?></td>
                              <td><?= $m['nama_mapel']?></td>
                              <td><?= $m['nama'] ?></td>
                              <td><?= $m['nama_tugas'] ?></td>
                              <td><?= $m['deskripsi'] ?></td>
                              <td><a href="<?= base_url('download/tugas/'.$m['idnilaitugas'])?>" class="btn btn-primary btn-sm text-white"><i class="fas fa-download"></i> Download</a></td>
                              <td><?= $m['batas_waktu'] ?></td>
                              <td class="text-center">
                                <a href="" class="btn btn-primary"><?= function_nilai_siswa($this->session->userdata('nama'), $m['idnilaitugas']) ?></a>
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

      <!-- COLLAPSE -->


      <div class="collapse" id="Ujian">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered table-sm" id="datatable1" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Mapel</td>
                            <td>Nama Ujian</td>
                            <td>Tipe Ujian</td>
                            <td>Jumlah Soal</td>
                            <td>KKM</td>
                            <td>Status</td>
                            <td>Action</td>
                          </tr>    
                        </thead>
                            
                        <tbody>
                          <?php $i=1;?>
                          <?php foreach($ujian as $m) : ?>
                            <tr>
                              <td><?= $i;?></td>
                              <td><?= $m['nama_mapel']?></td>
                              <td><?= $m['nama_ujian'] ?></td>
                              <td><?= $m['tipe_ujian'] ?></td>
                              <td><?= jumlah_soal_ujian($m['idujian']) ?></td>
                              <td><?= $m['kkm'] ?></td>
                              <td><?= status_ujian_siswa($m['idujian']) ?></td>
                              <td class="text-center">
                                <a href="<?= base_url('ujian/siswa?id_u='.$m['idujian'].'&nis='.urlencode(base64_encode($this->session->userdata('nama')))) ?>" class="badge badge-primary"><i class="fas fa-table"></i> Ambil ujian</a>
                              </td>
                            </tr>
                              <?php $i++;?>
                              <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

      <!-- COLLAPSE -->


 </div>
 <?php $this->load->view('siswa/modal/kumpulkan_tugas') ?>