
        <!-- Footer -->
        <footer>
            <!-- Footer top -->
            <div class="container footer_top">
                <div class="row">
                    <div class="col-lg-4 col-sm-7">
                        <div class="footer_item">
                            <h4><?= $footer['judul']; ?></h4>
                            <img style="width: 150px; margin-top: -15px;" src="<?= base_url('assets/img/images/'); ?><?= $footer['gambar']; ?>" alt="<?= $footer['judul']; ?>"/>
                            <p><?= $footer['deskripsi']; ?></p>

                            <ul class="list-inline footer_social_icon">
                                <?php foreach($sosmed as $s) : ?>
                                <li><a href="http://<?= $s['deskripsi']; ?>"><span class="fab fa-2x fa-<?= $s['judul']; ?>"></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-5">
                        <div class="footer_item">
                            <h4>Explore link</h4>
                            <ul class="list-unstyled footer_menu">
                                <li><a href="<?= base_url('home/blog'); ?>"><span class="fa fa-play"></span> Blog & Article</a>
                                <li><a href="<?= base_url('home/event'); ?>"><span class="fa fa-play"></span> Event and Job</a>
                                <li><a href="<?= base_url('home/team'); ?>"><span class="fa fa-play"></span> Meet our team</a>
                                <li><a href="<?= base_url('home/services'); ?>"><span class="fa fa-play"></span> Our services</a>
                                <li><a href="<?= base_url('home/forum'); ?>"><span class="fa fa-play"></span> Forum</a>
                                <li><a href="<?= base_url('home/help'); ?>"><span class="fa fa-play"></span> Help </a>
                                <li><a href="<?= base_url('home/privacy'); ?>"><span class="fa fa-play"></span> Privacy Policy</a>
                                <li><a href="<?= base_url('home/checkcert'); ?>"><span class="fa fa-play"></span> Check Certificate</a>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-7">
                        <div class="footer_item">
                            <h4>Latest post</h4>
                            <ul class="list-unstyled post">
                                <?php foreach ($post as $p): ?>
                                <li><a href="<?= base_url('home/article/'. $p['id'] . '/' . 'read'); ?>"><span class="date"><?= date('d', $p['time']); ?> <small><?= date('M', $p['time']); ?></small></span>  <?= $p['judul']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-5">
                        <div class="footer_item">
                            <h4>Contact us</h4>
                            <ul class="list-unstyled footer_contact">
                                <li><a href=""><span class="fa fa-map-marker"></span> <?= $footer['keterangan']; ?></a></li>
                                <li><a href=""><span class="fa fa-envelope"></span> <?= $contact['deskripsi']; ?></a></li>
                                <li><a href=""><span class="fa fa-phone"></span><?= $contact['judul']; ?></a></li>
                                <li><a href=""><span class="fa fa-fax"></span><?= $contact['keterangan']; ?></a></li>
                            </ul>
                             <ul class="list-inline sponsor">
                                <?php foreach($sponsor as $s) : ?>
                                <li><a><img src="<?= base_url('assets/img/'); ?>images/<?= $s['gambar']; ?>" class="img-sponsor" alt="<?= $s['judul']; ?>"></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Footer top end -->

            <!-- Footer bottom -->
            <div class="footer_bottom text-center">
                <p class="wow fadeInRight">
                    Copyright By 
                    <i class="fa fa-copyright"></i>
                    <a href="<?= base_url('') ?>"> IT Club SMKN 5 Bandung</a>
                    2020
                </p>
            </div><!-- Footer bottom end -->
        </footer><!-- Footer end -->

        <!-- JavaScript -->
        <script src="<?= base_url('assets/js/'); ?>js/jquery-1.12.1.min.js"></script>
        <script src="<?= base_url('assets/js/'); ?>js/bootstrap.min.js"></script>

        <!-- Bootsnav js -->
        <script src="<?= base_url('assets/js/'); ?>js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="<?= base_url('assets/js/'); ?>js/isotope.js"></script>
        <script src="<?= base_url('assets/js/'); ?>js/isotope-active.js"></script>
        <script src="<?= base_url('assets/js/'); ?>js/jquery.fancybox.js?v=2.1.5"></script>

        <script src="<?= base_url('assets/js/'); ?>js/jquery.scrollUp.min.js"></script>

        <script src="<?= base_url('assets/js/'); ?>js/main.js"></script>
    </body>	
</html>	