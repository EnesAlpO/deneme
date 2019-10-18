<?php $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ");
$kategorisor->execute(array()); ?>

<div class="col-lg-4 sidebar">
				
	
					<div class="single-widget popular-posts-widget">
						<div class="jq-tab-wrapper" id="horizontalTab">
							<div class="jq-tab-menu">

								<div class="jq-tab-title " data-tab="1">POPÜLERLER</div>
								<div class="jq-tab-title " data-tab="2">YAZILAR</div>
								<div class="jq-tab-title " data-tab="3">YAZARLAR</div>
							
							</div>
							<div class="jq-tab-content-wrapper">
								<div class="jq-tab-content active" data-tab="2">



									<div class="single-popular-post d-flex flex-row">
										<div class="popular-thumb">
											<img class="img-fluid" src="img/posts/carousel/stories1.jpg" alt="">
										</div>
										<div class="popular-details">
											<h6><a href="">Yazı Bir <br>
													Yazı hakkında</a></h6>
											<p>September 14, 2018</p>
										</div>
									</div>
									
								</div>

								<div class="jq-tab-content active" data-tab="3">

									<div class="single-popular-post d-flex flex-row">
										<div class="popular-thumb">
											<img class="img-fluid" src="img/posts/carousel/stories2.jpg" alt="">
										</div>
										<div class="popular-details">
											<h6><a href="">Yazar 1   <br>
													Yazar Hakkında</a></h6>
											<p>September 14, 2018</p>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
<div class="single-widget tags-widget">
						<h4 class="title">Kategoriler</h4>
						<ul>
							<?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){?>
							<li><a href="#"><?php echo $kategoricek['kategori_ad']; ?></a></li>
							<?php }  ?>
							
						</ul>
					</div>


	<div class="single-widget category-widget">
						<h4 class="title">Listeler</h4>
						<ul>
							<li>
								<a href="#" class="justify-content-between align-items-center d-flex">
									<p><img src="img/bullet.png" alt="">Tür 1</p>
								</a>
							</li>
							<li>
								<a href="#" class="justify-content-between align-items-center d-flex">
									<p><img src="img/bullet.png" alt="">Tür 2</p>
								</a>
							</li>
							<li>
								<a href="#" class="justify-content-between align-items-center d-flex">
									<p><img src="img/bullet.png" alt="">Tür 3</p>
								</a>
							</li>
							<li>
								<a href="#" class="justify-content-between align-items-center d-flex">
									<p><img src="img/bullet.png" alt="">Tür 4</p>
								</a>
							</li>
							
						</ul>
					</div>
					

				

				</div>
			</div>
		</div>
	</div>