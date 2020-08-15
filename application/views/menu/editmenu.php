  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
              <div class="col-lg-6">
              <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $Menu['id']; ?>">
                  <div class="form-group">
                      <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu..." value="<?= $Menu['menu']; ?>">
                      <small class="form-text text-danger ml-1"><?= form_error('menu'); ?></small>
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
