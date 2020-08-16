
        <!-- Testimonial -->
        <section id="testimonial">
            <div class="container text-center testimonial_area">
                <h2>Sekolah Menurut Para Alumni</h2>
                <p>Berikut penilaian sekolah menurut para alumni SMK Samudra Nusantara</p>

                <div class="row">
                    <?php foreach($testimonial as $t) : ?>
                    <div class="col-md-4">
                        <div class="testimonial_item">
                            <div class="testimonial_content text-left">
                                <p><?= $t['deskripsi']; ?></p>
                            </div>
                            <img src="<?= base_url('assets/img/testimonial/'); ?><?= $t['gambar']; ?>" alt="Testimonial" />
                            <p class="worker_name"><?= $t['judul']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section><!-- Testimonial end -->

        <!-- Contact form -->
        <section id="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Apa kamu punya pertanyaan?</h2>
                        <h2 class="second_heading">hubungi kami, GRATIS!</h2>
                    </div>
                    <form role="form" class="form-inline text-right col-md-6" >
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="msg" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn submit_btn">Submit</button>
                    </form>				
                </div>
            </div>
        </section><!-- Contact form end -->
