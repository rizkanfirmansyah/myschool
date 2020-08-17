<!-- Sidebar -->
<?php   
    $datatema = $this->db->get_where('tb_developer', ['setting' => 'tema'])->row_array();
    $theme =  $datatema['parameter'];
    $header = $this->db->get_where('data_homepage', ['jenis' => 'footer'])->row();
    $title_header = $header->judul;
 ?>
<ul class="navbar-nav bg-gradient-<?= $theme;?> sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= current_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $title_header;?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <?php 
        $menu = $this->menu->getDataMenu();
     ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>


        <!-- SUB MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM`user_sub_menu`  
                            WHERE `menu_id` = $menuId 
                            AND `is_active` = 1
            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) :  ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>



            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>


        <!-- Nav Item - User -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->