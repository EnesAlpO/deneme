<?php include'header.php';

?>

	<!-- Top Stories Area -->
	
						<!-- Slider 1 -->

					<?php include'slider1.php'; ?>

			
	<!-- Slider 1 bitiş-->
<?php
$slider2sor=$db->prepare("SELECT * FROM slider2 order by slider2_sira ");
$slider2sor->execute(array());

$vitrinsor=$db->prepare("SELECT * FROM vitrin "); // sıralama ayarlar
$vitrinsor->execute(array());



  ?>


						
						
	

	<!-- Slider2 Büyük olan -->
	<section class="post-slider-area">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="owl-carousel active-post-carusel">
						<!-- single carousel item -->
						
						<?php while($slider2cek=$slider2sor->fetch(PDO::FETCH_ASSOC)){ ?>
						<div class="single-post-carousel">
							<div class="post-thumb">
								<img class="img-fluid" src="img/archive/c1.jpg" alt="">
							</div>
							<div class="post-details">
								<h2><a href="#"><?php echo $slider2cek['slider2_kitapismi'] ?><br>
										<?php echo $slider2cek['slider2_description'] ?></a></h2>
								<div class="post-content d-flex justify-content-between">
									<div class="post-meta">
										<div class="thumb"><img src="img/author/a1.png" alt=""></div>
										<div class="c-desc">
											<h6><?php echo $slider2cek['slider2_yazar']; ?></h6>
											<p><span class="lnr lnr-calendar-full"></span><?php echo $slider2cek['slider2_tarih'] ?></p>
										</div>
									</div>
									<div class="details">
										<p><?php echo $slider2cek['slider2_aciklama'] ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

						<!--Slider 2 büyük olan-->
						
						<!-- single carousel item -->
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Start Post Silder Area -->

	<!-- Start main body Area -->
	<div class="main-body section-gap">
		<div class="container box_1170">
			<div class="row">
				<div class="col-md-8 post-list">
					<!-- Start Post Area -->
					<section class="post-area">
						<div class="row">
							



										<?php
										 
while($vitrincek=$vitrinsor->fetch(PDO::FETCH_ASSOC)){
if($vitrincek['vitrin_yayin']==1)
{

	?>

											
											<div class="col-md-6 col-md-16">

								<div class="single-post-item" >

									<div class="post-thumb">
										<img  src="<?php echo $vitrincek['vitrin_dresim']; ?>" >

									</div>
									<div class="post-details">

										<h4><a href="<?php echo "kitap-".seo($vitrincek['vitrin_seourl'])."?duzey=uzman"; ?>"><?php echo$vitrincek['vitrin_baslik']."<br>".$vitrincek['vitrin_kyazar']; ?></a></h4>
										
										<p><?php echo $vitrincek ['vitrin_description']; ?></p>

										<div class="blog-meta">
											<span class="lnr lnr-calendar-full"></span><?php echo "   ".$vitrincek['vitrin_tarih']; ?>
											<span class="lnr lnr-bubble"></span><?php echo "      ".$vitrincek['vitrin_begeni']; ?></span>
											<span class="lnr lnr-heart"></span><?php echo "      ".$vitrincek['vitrin_comment']; ?></span>
										</div>
									</div>

								</div>
								</div>



<?php }}?>
							
	<div class="col-lg-12">
								<nav class="blog-pagination justify-content-center d-flex">
									<ul class="pagination">
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Previous">
												<span aria-hidden="true">
													<span class="lnr lnr-arrow-left"></span>
												</span>
											</a>
										</li>
										<li class="page-item active"><a href="#" class="page-link">01</a>

										
										</li>
										<li class="page-item "><a href="#" class="page-link">02</a></li>
										<li class="page-item"><a href="#" class="page-link">03</a></li>
										<li class="page-item"><a href="#" class="page-link">04</a></li>
										<li class="page-item"><a href="#" class="page-link">09</a></li>
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Next">
												<span aria-hidden="true">
													<span class="lnr lnr-arrow-right"></span>
												</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
							
							</div>	
					</section>

					<!-- Start Post Area -->
				</div>


				<?php include 'sidebar.php'; ?>
			</div>
		</div>
	</div>
	<!-- Start main body Area -->

	<!-- start footer Area -->
	<?php include 'footer.php'; ?>