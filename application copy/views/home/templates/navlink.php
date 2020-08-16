<style>
    .top_nav .list a{
        color: white;
    }
    .top_nav .list a:hover{
        color: #75e7c2;
    }
</style>
    <br>
    <div class="container list-containt">
   <!-- Top Navbar -->
   <h2><?= $title; ?></h2>
   <?php $subtitle = $this->uri->segment(2); ?>
            <div class="top_nav">
                <div class="container list">
                    <a href="<?= base_url(); ?>"><span>Home</span></a>
                    <a> <span>/</span> </a>
                    <a href="<?= base_url('home/'.$subtitle); ?>"><span><?= $title; ?></span></a>

                </div>
            </div><!-- Top Navbar end -->
    </div>

      <div class="container">
                <div class="row">
                    <div class="container">
                        <a style="color: #999;" >Posted By <i class="fas fa-user"></i> Rizkan Firmansyah | </a>
                        <a style="color: #999;" >19 jun 2020</a> 
                    </div>
                </div>