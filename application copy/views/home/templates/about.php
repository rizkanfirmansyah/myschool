
        <!-- About -->
        <section id="about ">
            <div class="container about_bg mb-3">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="about_content">
                            <h2><?= $profile['judul']; ?></h2>
                            <h3><?= $profile['deskripsi']; ?></h3>
                            <p class="font-weight-bold text-gray-1000"><?= $profile['keterangan']; ?></p>
                            <!-- <a  class="btn know_btn">know more</a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="about_banner">
                            <img src="<?= base_url('assets/img/'); ?>images/<?= $profile['gambar']; ?>" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- About end -->
