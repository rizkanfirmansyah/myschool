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
   <?php $subtitle = $this->uri->segment(2);$links = $this->uri->segment(3); ?>
            <div class="top_nav">
                <div class="container list">
                    <a href="<?= base_url(); ?>"><span>Home</span></a>
                    <a> <span>/</span> </a>
                    <a href="<?= base_url('home/'.'blog'); ?>"><span><?= $title; ?></span></a>
                    <a> <span>/</span> </a>
                    <a href="<?= base_url('home/'.$links .'/read'); ?>"><span><?= $substitle; ?></span></a>

                </div>
            </div><!-- Top Navbar end -->
    </div>

      <div class="container">
                <div class="row">
                    <div class="container">
                        <a style="color: #999;" >Posted By <i class="fas fa-user"></i> <?= $article['name']; ?> | </a>
                        <a style="color: #999;" ><?= date('d M Y', $article['time']); ?> | <?= $article['tag']; ?></a> 
                    </div>
                </div>

