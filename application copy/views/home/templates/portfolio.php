
        <!-- Portfolio -->
        <section id="portfolio">
            <div class="container portfolio_area text-center">
                <h2>Gallery dan Portfolio Kami</h2>
                <p>Berikut adalah beberapa foto-foto kami dan portfolio dari SMKN 5 Bandung</p>

                <div id="filters">
                    <button class="button is-checked" data-filter="*">Show All</button>
                    <?php foreach($foto as $f) : ?>
                    <button class="button" data-filter=".<?= $f['tag']; ?>"><?= $f['tag']; ?></button>
                    <?php endforeach; ?>
                </div>
                <!-- Portfolio grid -->		
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="grid-item grid-item--width2 grid-item--height2 <?= $f['tag']; ?> plumbing interior">
                        <img alt="" src="<?= base_url('assets/img/'); ?>gallery/<?= $bigSize['gambar']; ?>" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="<?= base_url('assets/img/'); ?>gallery/highligh_img.jpg" data-fancybox-group="gallery" title="<?= $bigSize['keterangan']; ?>"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-download"></span></a>
                        </div>  
                    </div>
                    <?php foreach($foto as $f) : ?>
                    <div class="grid-item <?= $f['tag']; ?> interior isolation">
                        <img alt="" src="<?= base_url('assets/img/'); ?>gallery/<?= $f['gambar']; ?>" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="<?= base_url('assets/img/'); ?>gallery/<?= $f['gambar']; ?>" data-fancybox-group="gallery" title="<?= $f['keterangan']; ?>"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-download"></span></a>
                        </div>   
                    </div>
                    <?php endforeach; ?>

                </div><!-- Portfolio grid end -->
            </div>
        </section><!-- Portfolio end -->
