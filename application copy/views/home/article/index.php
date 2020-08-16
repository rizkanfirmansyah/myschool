
       <!-- Services -->
        <section id="services" style="margin: 20px 10px 0 -10px;">
            <div class="container">
                <div class="row">
                	<?php foreach ($blog as $b): ?>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="<?= base_url('assets/img/artikel/'.$b['image']); ?>" style="height: 240px;" alt="Our Services" />
                            <h5><?= $b['judul']; ?></h5>
                            <p><?= $b['deskripsi']; ?></p>
                            <p style="color: #888;">Rizkan Firmansyah | 17 Apr 2020 | networking</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </section><!-- Services end -->

    </div>


