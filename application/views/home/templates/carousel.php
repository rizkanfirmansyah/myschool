 <section id="home" class="home">
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel-inner -->
                <div class="carousel-inner" role="listbox">
                    <?php foreach($slider as $s) : ?>
                    <div class="item <?= slider_active($s['id']) ?>">
                        <img src="<?= base_url('assets/img/images/' . $s['gambar']); ?>" style="width: 1600px;" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption" style="margin-top: 100px;">
                                <h3><?= $s['judul']; ?></h3>
                                <h1 class="second_heading"><?= $s['deskripsi']; ?></h1>
                                <p><?= $s['keterangan']; ?>t</p>
                                <!-- <a  class="btn know_btn">know more</a> -->
                                <!-- <a  class="btn know_btn">view project</a> -->
                            </div>					
                        </div>
                    </div>
                <?php endforeach; ?>
                </div><!-- Carousel-inner end -->



                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Carousel end-->

        </section>

