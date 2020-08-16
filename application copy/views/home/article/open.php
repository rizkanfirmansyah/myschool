        <!-- About -->
          <div class="row" style="margin-top: 50px;">
                            <h2 class="text-center"><?= $article['judul']; ?></h2>
			          	<div class="col text-center">
                            <img src="<?= base_url('assets/img/artikel/'.$article['image']); ?>" style="max-width: 400px; margin-bottom: 30px;" alt="" />
			          	</div>
                    <div class="col-lg">
                            <section style="margin: 0 20px 0 20px;">
                            	<?= substr($article['artikel'], 0, 100000); ?> 
								</em> </i></a></p></b></li></ol></ul></h1></h2></h3></h4></h5>
                            </section>
                    </div>
                    <div class="col-lg bg-primary" style="margin: 0 20px 0 20px;">
                    	<span>&nbsp;&nbsp; &copy; IT Club All Right Reserved</span>
                    	<span style="float:right;"> Dilihat <?= $article['lihat']; ?>x&nbsp;&nbsp;</span>
                    </div>
                    <div class="col-lg">
                    	<div class="row" style="margin-left: 30px; margin-right: 30px;">
                    		<div class="col-lg-3">
                    			<h4>Ringkasan :</h4>
                    		</div>
                    		<div class="col-lg-6" style="margin: 8px auto;	">
                    			<?= $article['deskripsi']; ?>
                    		</div>
                    	</div>
                    </div>
                    <div class="col-lg">
                    	<div class="row" style="margin:30px 30px 0 30px;">
                    		<div class="col-lg-3">
                    			<h4>Komentar :</h4>
                    		</div>
                    		<style>
                    			.text-color-komen{
                    				color: #999;
                    			}
                    			.text-color-komen:hover{
                    				color: #bbb;
                    				font-size: 16px;
                    			}
                    			.img-artikel{
                    				 max-width: 60px;
                    				 max-height: 60px;
                    				 border-radius: 50%;
                    			}
                    			.span-artikel{
                    				padding: 8px 0 0 10px;
                    				height: 0;
                    				position: absolute;
                    				color: #999;
                    			}
                    			.span-artikel2{
                    				padding: 28px 0 0 9px;
                    				height: 0;
                    				position: absolute;
                    				color: #999;
                    			}
                    		</style>
                    		<div class="col-lg-6 text-center" style="margin : 10px auto;">
                    			<a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="text-color-komen">Tampilkan Komentar</a>
                    		</div>
                    	</div>
                    </div>
                    <div class="col-lg-12 collapse multi-collapse" id="multiCollapseExample1">
				   	<div class="row">
                   		 <div class="col-lg-9" style="margin: 10px 0 0 30px;">
                   		 	<?php foreach ($komentar as $kom): ?>
				    		<div class="comment">
					    		<img src="<?= base_url('assets/img/profile/') . $kom['image']; ?>" alt="" class="img-artikel ">
								<span class="span-artikel"><?= $kom['name']; ?></span>
								<span class="span-artikel2"><?= date('d M Y H:i', $kom['time']); ?></span>
								<p><?= $kom['komentar']; ?></p>
				    		</div>
                   		 	<?php endforeach; ?>
                   		 </div>
				    	<div class="col-lg-2" style="background: #888; color: white; padding: 20px; margin: 0 10px">
				    		<p style="font-size: 20px;">Info Seputar:</p>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam totam incidunt rerum sit debitis odit et at impedit odio porro!</p>
				    	</div>
					</div>
                    </div>
                </div>

       <!-- Services -->
        <section id="services">
            <div class="container">
                <h2>Divisi KAMI</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="<?= base_url('assets/img/'); ?>images/service_img1.jpg" alt="Our Services" />
                            <h3>NETWORKING</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="<?= base_url('assets/img/'); ?>images/service_img2.jpg" alt="Our Services" />
                            <h3>PROGRAMMING</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="<?= base_url('assets/img/'); ?>images/service_img3.jpg" alt="Our Services" />
                            <h3>MULTIMEDIA</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="row text-center">
                    	<a href="<?= base_url('home/blog'); ?>" class="bg-primary" style="padding: 3px 75px 3px 75px;border-radius: 30px;">Tampilkan lebih banyak</a>
                    </div>
                </div>
            </div>
        </section><!-- Services end -->


<!-- Services -->
        <section id="services">
            <div class="container">
                <h2>Divisi KAMI</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="service_item">
							<iframe src="https://youube.com/HGKjnmbn6" frameborder="0"></iframe>
                            <h3>NETWORKING</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
							<iframe src="https://youube.com/HGKjnmbn6" frameborder="0"></iframe>
                            <h3>PROGRAMMING</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
							<iframe src="https://youube.com/HGKjnmbn6" frameborder="0"></iframe>
                            <h3>MULTIMEDIA</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="row text-center">
                    	<a href="" class="bg-primary" style="padding: 3px 75px 3px 75px;border-radius: 30px;">Tampilkan lebih banyak</a>
                    </div>
                </div>
            </div>
        </section><!-- Services end -->



</div>
<!-- container -->