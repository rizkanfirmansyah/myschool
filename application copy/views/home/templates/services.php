
        <!-- Why us -->
        <section id="why_us">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="head_title">
                            <h2>KENAPA MEMILIH KAMI?</h2>
                            <p>Beberapa keunggulan yang bisa diperoleh di IT Club adalah ilmu teknologi 4.0 yang dipelajari, pembelajaran yang terstruktur, berkreasi, relasi(jaringan), event dan jobdesk serta pengalaman berorganisasi</p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($services as $s) : ?>
                    <div class="col-md-<?= service_row($service_row); ?> col-sm-6">
                        <div class="why_us_item">
                            <span class="<?= $s['gambar']; ?> text-primary"></span>
                            <h4><?= $s['judul']; ?>)</h4>
                            <p><?= $s['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section><!-- Why us end -->

        <!-- Services -->
        <section id="services">
            <div class="container">
                <h2>Artikel Berita</h2>
                <div class="row">
                    <?php foreach($newsfeed as $n ) :?>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="<?= base_url('assets/img/'); ?>artikel/<?= $n['image']; ?>" alt="Our Services" />
                            <h3><?= $n['judul']; ?></h3>
                            <p><?= $n['deskripsi']; ?></p>
                            <a href="<?= base_url('home/article/'.$n['id'].'/read'); ?>" class="btn know_btn">Baca lebih lanjut</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section><!-- Services end -->
