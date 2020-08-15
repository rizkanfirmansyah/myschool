  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= $this->session->flashdata('message'); ?>

    <div class="row">
    <div class="col-lg-6">
    <form action="" method="post">
        <div class="form-group row">
          <div class="col-md-8">
            <input type="text" class="form-control" id="role" name="role" placeholder="Role..." value="<?= $Role['role']; ?>">
            <small class="form-text text-danger ml-1"><?= form_error('role'); ?></small>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" id="id" name="id" placeholder="id..." value="<?= $Role['id']; ?>">
            <small class="form-text text-danger ml-1"><?= form_error('id'); ?></small>
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
