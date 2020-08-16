<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= $title; ?></title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="<?= base_url('assets/font/'); ?>custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet" type="text/css">
        <!-- Bootsnav -->
        <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/'); ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />	
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <!-- Preloader -->

        <div id="loading" title="<?= $title; ?>">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                </div>
            </div>
        </div>

        <!--End off Preloader -->

        <!-- Header -->
        <header>
            <!-- Top Navbar -->
            <div class="top_nav">
                <div class="container">
                    <ul class="list-inline info">
                        <li><a href="#"><span class="fa fa-envelope"></span> <?= $contact['deskripsi']; ?></a></li>
                        <li><a href="#"><span class="fas fa-clock"></span> <?= date('D').' '. $contact['gambar'] ; ?></a></li>
                    </ul>
                    <ul class="list-inline social_icon">
                        <li><a href="#"><span class="fa fa-phone"></span> <?= $contact['judul']; ?></a></li>
                        <li><a href="#"><span class="fa fa-fax"></span> <?= $contact['keterangan']; ?></a></li>
                    </ul>			
                </div>
            </div><!-- Top Navbar end -->

            <!-- Navbar -->
            <nav class="navbar bootsnav">
                <!-- Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <!-- Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <!-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> -->
                            
                        </ul>
                    </div>
                    <!-- Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href=""><img class="logo" src="<?= base_url('assets/img/images/'). $footer['gambar']; ?>" alt="<?= $footer['deskripsi']?>" style="width: 80px;"></a>
                    </div>
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav menu">
                            <li><a href="<?= base_url(); ?>">Home</a></li>                    
                            <li><a href="<?= base_url('home/'); ?>about">About Us</a></li>
                            <li><a href="<?= base_url('home/'); ?>divisi">Division</a></li>
                            <li><a href="<?= base_url('home/'); ?>gallery">Gallery</a></li>
                            <li><a href="<?= base_url('home/'); ?>portfolio">Portfolio</a></li>
                            <li><a href="<?= base_url('home/'); ?>contact">Contact Us</a></li>
                            <li>
                                <a href="<?= base_url('auth/login'); ?>" class="nav-tertentu">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>   
            </nav><!-- Navbar end -->
        </header><!-- Header end -->

