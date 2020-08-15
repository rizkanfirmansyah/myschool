<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 ml-3 mt-3 p-5"><img style="width: 200px;" src="<?= base_url('assets/img/images/'); ?><?= $footer['gambar']; ?>" alt="<?= $footer['judul']; ?>" class="ml-5 mt-3 p-auto"/></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><?= $title; ?> </h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                  <div class="form-group">
                    <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="isi dengan nip anda" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <i class="fas fa-eye-slash mr-3 float-right right my-2"></i>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button href="index.html" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                  <hr>
                </form>
               
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
