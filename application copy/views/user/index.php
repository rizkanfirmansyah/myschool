             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                 <div class="row">
                     <div class="col-lg-8">
                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-md-8 shadow">
                         <div class="card-body">
                             <div class="table-responsive table-bordered-less">
                                <div class="row no-gutters" >
                                  <div class="col-md-4 pb-5 pr-5 ">
                                    <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="card-img " alt="...">
                                  </div>
                                  <div class="col-md-8">
                                      <table class="table table-borderedless">
                                        <tbody>
                                          <tr>
                                            <td>Nama</td>
                                            <td class="text-center">:</td>
                                            <td><?= $user['nama']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Email</td>
                                            <td class="text-center">:</td>
                                            <td><?= $user['email']; ?></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                  </div>
                                </div>
                             </div>
                         </div>
                     </div>
                     </div>
                     </div>
                     </div>
               