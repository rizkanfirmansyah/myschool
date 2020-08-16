<!-- Modal: kesiswaan -->
<div class="modal fade right" id="kesiswaan-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Detail Data
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('data/import/staff');?>

      <!--Body-->
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataAdmin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($kesiswaan as $k) : ?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $k['nama'] ?></td>
                            <td><?= $k['nama_jabatan'] ?></td>
                            <td><?= $k['status'] ?></td>
                            <td><a href="" data-toggle="toggle"></a></td>
                        </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal: kesiswaan -->


<!-- Modal: kurikulum -->
<div class="modal fade right" id="kurikulum-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Detail Data
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('data/import/staff');?>

      <!--Body-->
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataAdmin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal: kurikulum -->


<!-- Modal: tatausaha -->
<div class="modal fade right" id="tatausaha-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Detail Data
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('data/import/staff');?>

      <!--Body-->
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataAdmin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal: tatausaha -->


<!-- Modal: sarana -->
<div class="modal fade right" id="sarana-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <span class="heading lead">Detail Data
            </span>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>
    <?= form_open_multipart('data/import/staff');?>

      <!--Body-->
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataAdmin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal: sarana -->
