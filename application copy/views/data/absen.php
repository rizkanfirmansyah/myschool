             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
			

			<div class="container">
				<div class="col-md-6" style="margin-left: -20px;">
                 	<?= $this->session->flashdata('message'); ?>
				</div>	
            </div>

        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="m-0 mt-2 font-weight-bold text-primary">Data User</h6>
                </div>
                     <div class="ml-auto mt-auto col-md-6">
                           <form action="<?= base_url('data/absen'); ?>" method="post" style="margin-left: 10px;">
                                <div class="row">
                                    <select class="form-control col-md-4" id="keterangan" name="keterangan">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Dispen">Dispen</option>
                                        <option value="Alfa">Alfa</option>
                                      </select>
                                  <div class="input-group col-md-8">
                                        <input type="text" id="user_id" name="user_id" placeholder="Masukkan User ID..." class="form-control" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                          <button type="submit" class="btn btn-outline-success">Absen</button>
                                      </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                                    <small class="form-text text-danger ml-1" style="margin-bottom: -20px;"><?= form_error('user_id'); ?></small>
                        </div>
                    </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                  <thead>
                       <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
              <?php $i=1; ?>
                      <?php foreach( $absen as $a) : ?>
                        <tr>
                          <th><?= $i; ?></th>
                          <td class="text-uppercase"><?= $a['user_id']; ?></td>
                          <td><?= $a['name']; ?></td>
                          <td><?= $a['keterangan']; ?></td>
                          <td><?= date('D/d-M-Y',$a['time']); ?></td>
                          <td>
                            <a href="<?= base_url('hapus/absen/'.$a['id']); ?>" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                            <a href="" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
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
<!-- /.container-fluid -->

             </div>
     <!-- End of Main Content -->