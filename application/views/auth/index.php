<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">IT Club Authentication Page </h1>
                </div>
                <div class="row">
                  <div class="card text-white bg-primary" style="max-width: 18rem;">
                    <a href="<?= base_url('auth/registeruser'); ?>" class="text-white justify-content-center" style="text-decoration: none;"><div class="card-body">
                      <h3 class="card-title">User Only</h3>
                    </div></a>
                </div>  
                <div class="card text-white bg-primary" style="max-width: 18rem;">
                    <a href="<?= base_url('auth/registermember'); ?>" class="text-white justify-content-center" style="text-decoration: none;"><div class="card-body">
                      <h3 class="card-title">Member</h3>
                    </div></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>