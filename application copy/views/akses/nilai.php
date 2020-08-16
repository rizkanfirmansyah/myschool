  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= $this->session->flashdata('message'); ?>

            <div class="row">
            <div class="col-lg-6">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $nilai['id']; ?>">
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>" readonly>
                    <small class="form-text text-danger ml-1"><?= form_error('nama'); ?></small>
                </div>   
                <div class="form-group">
                    <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $nilai['tugas']; ?>" readonly>
                    <small class="form-text text-danger ml-1"><?= form_error('tugas'); ?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="waktu" name="waktu" value="<?= date('d-m-Y'); ?>" readonly>
                    <small class="form-text text-danger ml-1"><?= form_error('waktu'); ?></small>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="nilai" name="nilai" value="<?= $nilai['nilai'] ?>" placeholder="Nilai Tugas...">
                    <small class="form-text text-danger ml-1"><?= form_error('nilai'); ?></small>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" id="komentar" name="komentar" placeholder="Masukan Komentar..."><?= $nilai['komentar'] ?></textarea>
                    <small class="form-text text-danger ml-1"><?= form_error('komentar'); ?></small>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
            </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
