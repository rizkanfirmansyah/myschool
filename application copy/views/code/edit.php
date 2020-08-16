             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->

                 <h1 class="h3 mb-4 text-gray-800">Edit <?= $title; ?></h1>

              
              <div class="row ml-2">
              	<form class="form-inline" method="post" action="<?= base_url('back/end/update/'). $code['id_id']; ?>">
				  <input type="text" class="form-control mb-2 mr-sm-2" name="nama_komponen" id="nama_komponen" value="<?= $code['nama_komponen']; ?>">
				  <input type="text" class="form-control mb-2 mr-sm-2" name="jumlah_baris" id="jumlah_baris" value="<?= $code['jumlah_baris']; ?>">
				  <input type="text" class="form-control mb-2 mr-sm-2" name="jumlah_code" id="jumlah_code" value="<?= $code['jumlah_code']; ?>">
              </div>

              <div class="row ml-2">
				<div class="form-group">
				    <select class="form-control" name="id_komponen" id="id_komponen">
				      <option value="<?= $get['id']; ?>"><?= $get['komponen']; ?></option>
					     <?php foreach ($komponen as $kom): ?>
					     	<option value="<?= $kom['id']; ?>"><?= $kom['komponen']; ?></option>
					     <?php endforeach; ?>
				    </select>
				  </div>
			<div class="custom-control custom-checkbox mx-2">
				<?php if ($code['modifier'] == 1): ?>
					<input type="checkbox" class="custom-control-input" value="0" name="modifier" id="modifier">
			  		<label class="custom-control-label" for="modifier">Maintanance</label>
			  	<?php else: ?>
			  		<input type="checkbox" class="custom-control-input" value="1" name="modifier" id="modifier">
			  		<label class="custom-control-label" for="modifier">Normal</label>
				<?php endif ?>
			</div>

				  <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </div>
				</form>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->