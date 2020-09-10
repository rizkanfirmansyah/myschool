      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning mx-1 ml-auto"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <!-- <a href="<?= base_url('format/jadwal'); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash fa-sm text-white-50"></i> Format</a> -->
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
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
                      <th>Nama <?= $id  ?></th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach($table as $t) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $t['nama_'.$id] ?></td>
                      <td><?= status($t['status']) ?></td>
                      <td>
                          <a href="#" data-id="<?= $t['id_'.$id] ?>" data-nama="<?= $t['nama_'.$id] ?>" data-toggle="modal" id="btnEditData" data-target="#dataEdit" class="text-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url('hapus/inventaris/'.$formInput.'/'.$t['id_'.$id].'/id_'.$id) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $i++?>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- SCRIPT INCLUDE INTERNAL -->

        </div>
        </div>
        </div>


   <!-- Modal: Tambah Inventaris -->
    <div class="modal fade right" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content ">
          <!--Header-->
          <div class="modal-header">
            <span class="heading lead">Tambah Data <?= $id ?>
                </span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

          <!--Body-->
          <div class="modal-body">
            <!--Basic textarea-->
            <form action="<?= base_url('input/inventaris/'.$formInput.'/'.$id) ?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="<?= $id?>">Input data <?= $id?></label>
                <input type="text" name="<?= $btnId?>" class="form-control">
                </div>
                
                <input type="hidden" name="status" value="1">
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

    <div class="modal fade right" id="dataEdit" tabindex="-1" role="dialog" aria-labelledby="editDataLabel"
      aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content ">
          <!--Header-->
          <div class="modal-header">
            <span class="heading lead">Edit Data <?= $id ?>
                </span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

          <!--Body-->
          <div class="modal-body">
            <!--Basic textarea-->
            <form action="<?= base_url('edit/inventaris/'.$formInput.'/'.$id) ?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                <label class="text-capitalize" for="<?= $id?>">Edit data <?= $id?></label>
                <input type="text" name="<?= $btnId?>" id="namaEditData" class="form-control">
                <input type="hidden" name="<?='id_'.$id?>" id="idEditData" class="form-control">
                </div>
             </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>

          <!--Footer-->
      </div>
    </div>
    <!-- Modal: user -->
