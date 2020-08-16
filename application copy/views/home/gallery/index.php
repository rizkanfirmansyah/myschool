<section id="gallery" style=" padding-right: 10px; padding-bottom: 40px; background-color: #42a5f5;">
            <div class="container portfolio_area text-center">
                <div id="filters">
                    <button class="button is-checked" data-filter="*">Show All</button>
                    <?php foreach ($foto as $f): ?>
                        <button class="button" data-filter=".<?= $f['tag']; ?>"><?= $f['tag']; ?></button>
                    <?php endforeach; ?>
                </div>
                <!-- Portfolio grid -->		
                <div class="grid" style="margin-right: 30px;">
                    <div class="grid-sizer"></div>
                    <div class="grid-item grid-item--width2 grid-item--height2 <?= $bigSize['tag']; ?> plumbing interior">
                        <img alt="" src="<?= base_url('assets/img/gallery/') . $bigSize['gambar']; ?>" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="<?= base_url('assets/img/gallery/') . $bigSize['gambar']; ?>" data-fancybox-group="gallery" title="<?= $bigSize['keterangan']; ?>"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-download"></span></a>
                        </div>  
                    </div>
                    <?php foreach ($foto as $f): ?>
                    <div class="grid-item <?= $f['tag']; ?> interior isolation">
                        <img alt="" src="<?= base_url('assets/img/gallery/'. $f['gambar']); ?>" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="<?= base_url('assets/img/gallery/'. $f['gambar']); ?>" data-fancybox-group="gallery" title="<?= $f['keterangan'] . ' | ' . date('d-M-Y', $f['waktu']); ?>"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-download"></span></a>
                        </div>   
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Portfolio grid end -->    
            </div>
        </section><!-- Portfolio end -->

    </div>