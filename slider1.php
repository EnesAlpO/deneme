
<?php
$slidersor=$db->prepare("SELECT * FROM slider order by slider_sira ");
$slidersor->execute(array());

  ?>
<section class="top-stories-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel active-stories-carousel">
						

<?php while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){ ?>
	<!-- Slider 1 6 tane olmalı en az-->


						

			<div class="single-stories-carousel d-flex align-items-center">
				

							<div class="stories-thumb">
								<img class="img-fluid" src="img/slider1/biromurnasilyasanir.jpg" alt="">
							</div>



							<div class="stories-details">
								<h6><a href="<?php echo$slidercek['slider_link']; ?>"><?php echo $slidercek['slider_kitapisim']; ?><br>
										<?php echo$slidercek['slider_description']; ?></a></h6>
								<p><?php echo$slidercek['slider_tarih']; ?></p>
							</div>
</div>	



						
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>