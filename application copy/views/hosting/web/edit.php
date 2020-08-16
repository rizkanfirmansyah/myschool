             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                
                <div class="row">
                    <div class="col">
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    </div>
                </div>

                <form action="<?= base_url('hosting/efolder'); ?>" method="post" class="col-md-6">
                  <div class="form-group">
                    <label for="folder">Nama folder</label>
                    <input type="text" class="form-control" id="folder" name="folder" value="<?= $folder['folder']; ?>">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $folder['id']; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                 


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

