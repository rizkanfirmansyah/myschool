<style>
	.email_form {
		margin-top: 15px;
	}
</style>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/images/logo.png'); ?>" alt="">
			</div>
			<div class="col-md-8">
				 <div class="table-responsive">
                            <table class="table table-borderless" id="datatables2">
                               <tbody>
                              	<tr>
                              		<td>IT Club SMKN 5 Bandung</td>
                               	</tr>
                              	<tr>
                              		<td>Jl. Bojongkoneng No.37A Gedung RI</td>
                               	</tr>
                              	<tr>
                              		<td>info@itclub.com</td>
                               	</tr>
                              	<tr>
                              		<td>Telp. 083192216831</td>
                               	</tr>
                              	<tr>
                              		<td>Sabtu, 08:00 - 16:00</td>
                               	</tr>
                              	<tr>
                              		<td>
                              			<a href="" class="text-success"><i class="fab fa-2x fa-whatsapp"></i></a> &nbsp;&nbsp;
                              			<a href="" class="text-danger"><i class="fab fa-2x fa-youtube"></i></a>&nbsp;&nbsp;
                              			<a href="" class="text-primary"><i class="fab fa-2x fa-facebook"></i></a>&nbsp;&nbsp;
                              			<a href="" class="text-danger"><i class="fab fa-2x fa-instagram"></i></a>
                              			
                              	</td>
                               	</tr>
                                </tbody>
                          </table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card">
			<div class="col offset-2 text-center">
				<i class="fas fa-envelope fa-3x" style="margin-top: 30px;"></i>
				<form action="<?= base_url('home/send/email'); ?>" method="post">
					<div class="form-group" style="margin: 0 20px 0 20px; padding-top: 10px;">
						<div class="row email_form">
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<label  class="text-capitalize" for="email">email :</label>
							</div>
							<div class="col-md-7">
								<input type="email" name="email" id="email" class="form-control" />
							</div>
						</div>
						<div class="row email_form">
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<label  class="text-capitalize" for="nama">nama 	:</label>
							</div>
							<div class="col-md-7">
								<input type="text" name="nama" id="nama" class="form-control" />
							</div>
						</div>
						<div class="row email_form">
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<label  class="text-capitalize" for="telp">telp 	:</label>
							</div>
							<div class="col-md-7">
								<input type="number" name="telp" id="telp" class="form-control" />
							</div>
						</div>
						<div class="row email_form">
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<label  class="text-capitalize" for="subject">subject	 :</label>
							</div>
							<div class="col-md-7">
								<input type="text" name="subject" id="subject" class="form-control" />
							</div>
						</div>
						<div class="row email_form">
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<label  class="text-capitalize" for="email">Text 	:</label>
							</div>
							<div class="col-md-7">
								<textarea name="text" id="text" cols="30" rows="5" class="form-control"></textarea>
							</div>
						</div>
						<div class="row email_form">
							<div class="col-md-3"></div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-2">
										<input type="text" cols="1" name="rand" id="rand" disabled value="   <?= mt_rand(1000, 9999); ?>">
									</div>
									<div class="col-md-1">
										<input type="text" name="confirm" id="confirm">
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-5">
								<button type="submit" class="btn btn-success"> Send <i class="fas fa-envelope"></i></button>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	

</div>