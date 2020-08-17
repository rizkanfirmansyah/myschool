<div class="flash-data" id="sweetMessage" data-tipe="<?= $this->session->flashdata('tipe'); ?>" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- Content Wrapper --> 
<div id="content-wrapper" class="d-flex flex-column">
<?php   
    $datatema = $this->db->get_where('tb_developer', ['setting' => 'topbar'])->row_array();
    $theme =  $datatema['parameter'];
 ?>
    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-<?= $theme; ?> topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <?php 
                $berita = [
                    'so beautiful in white tonight rilis malam ini tunggu ya gaes',
                    'nanananana so beautiful in white so love a leabing you',
                    'hehehe nyanyio bentar gaes oke jangan marah yaa'
                ];
             ?>

            <marquee behavior="100" direction="">
                <?php foreach ($berita as $b): ?>
                    <?= $b; ?> |
                <?php endforeach; ?>
            </marquee>
                
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-user-circle fa-2x"></i>
                        <?php if ($theme == 'white'): ?>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                        <?php else: ?>
                            <span class="mr-2 d-none d-lg-inline text-white small"><?= $user['nama']; ?></span>
                        <?php endif ?>
                        <!--  -->
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="<?= base_url('user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a> -->
                        <a class="dropdown-item" href="<?= base_url('user/changepassword'); ?>">
                            <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        <a class="dropdown-item" href="<?= base_url('user/setting'); ?>">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <?php if ($this->session->userdata['role_id'] == 1): ?>
                            <?php if ($this->session->userdata('debug')): ?>
                                <a class="dropdown-item" href="<?= base_url('developer/developer'); ?>">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Developer setting
                                </a>
                                <?php else: ?>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#devBug">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Developer setting
                                </a>
                            <?php endif ?>
                        <?php endif ?>
                        <a class="dropdown-item" href="<?= base_url('user/log'); ?>">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->


                         <?php  
                            $site = current_url();
                          ?>


             <!-- Modal -->
             <div class="modal fade" id="devBug" tabindex="-1" role="dialog" aria-labelledby="devBugLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="devBugLabel">Entry Password Debug</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <?= form_open_multipart('developer/setting');?>
                             <div class="modal-body">
                                  <div class="form-group">
                                      <input type="password" class="form-control" name="password" id="password" required autocomplete="off">
                                  </div>
                                  <input type="hidden" name="site" value="<?= $site; ?>">
                             </div>
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">Entry</button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>

     <!-- Modal Ubah