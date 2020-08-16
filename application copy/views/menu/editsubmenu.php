  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= $this->session->flashdata('message'); ?>

            <div class="row">
            <div class="col-lg-6">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $submenu['title']; ?>">
                    <small class="form-text text-danger ml-1"><?= form_error('title'); ?></small>
                </div>
                <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="<?= $submenu['menu_id']; ?>">Select Menu</option>
                    <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?> </option>
                    <?php endforeach; ?>
                </select>
                        <small class="form-text text-danger ml-1"><?= form_error('menu_id'); ?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $submenu['url']; ?>">
                    <small class="form-text text-danger ml-1"><?= form_error('url'); ?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $submenu['icon']; ?>">
                    <small class="form-text text-danger ml-1"><?= form_error('icon'); ?></small>
                </div>
                <div class="form-group">
                     <select name="is_active" id="is_active" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                        <small class="form-text text-danger ml-1"><?= form_error('is_active'); ?></small>
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
