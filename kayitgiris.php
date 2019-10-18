<?php include'header.php';

	
date_default_timezone_set('Europe/Istanbul');
 ?>
	<!-- End banner Area -->

	<!-- Start Sample Area -->
	
	<!-- End Sample Area -->

	<!-- Start Button -->
	
	<!-- End Button -->

	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<br>
				
				<div class="row">
					<div class="col-md-6">
						
						<img src="img/kayitgiris.png" alt="" class="img-fluid">
						<div class="section-top-border">

				<div class="row">
					<div class="col-lg-12 col-md-12">
					<?php if ($_GET['durum']=="yanlis") {?>
						<span style="color:#8F2DB6"  >Maliniz Yada Şifreniz Yanlış</span>
					<?php } ?>
					<h3 class="mb-30"><span style="color:#8F2DB6"  >Giriş Yap</span> </h3>
						<form action="admin/netting/islem.php" method="POST">
							<div class="mt-10">
								<input type="text" name="uye_mail" placeholder="Kullanıcı Adı(Mail)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kullanıcı adı(email)'"
								 required class="single-input">
							</div>
							<div class="mt-10">
								<input type="password" name="uye_sifre" placeholder="Şifre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifre'"
								 required class="single-input">
							</div>
							
							<div class="button-group-align " align="center">
							<br>

<button type="submit" class="genric-btn primary e-large" name="uyegiris">Giriş Yap</button>
<a href="#" class="genric-btn link">Şifremi Unuttum</a>
</div>
							
						</form>
						
  









					</div>
					
				</div>
			
</div>
					</div>
			<div class="col-lg-6">
					
						<img src="img/kayitgiris2.png" alt="" class="img-fluid" >
						<div class="section-top-border">

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<?php 	if($_GET['durum']=="yes"){ ?>
						
						
						<span style="color:#8F2DB6"  >Kayıt Başarılı</span>
					<?php 	} ?>
<?php 	if($_GET['durum']=="eslesme"){ ?>
						
						
						<span style="color:#8F2DB6"  >Bu Maile Sahip Başka Bir Üyemiz Var</span>
					<?php 	} ?>

							<h3 class="mb-30"><span style="color:#8F2DB6"  >Kayıt Oluştur</span> </h3>
						<form action="admin/netting/islem.php" method="POST" enctype="multipart/form-data"  >
							<div class="mt-10">
								<input type="text" name="uye_ad" placeholder="Adınız " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adınız '"
								 required class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="uye_soyad" placeholder="Soyadınız" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Soyadınız'"
								 required class="single-input">
							</div>
							<div class="mt-10">
								<input type="password" name="uye_sifre" placeholder="Şifreniz " required="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifreniz'"
								  class="single-input">


							</div>
							<div class="mt-10">
<label for="uye_resim" >Resminiz(İsteğe Bağlı)</label>
								<input type="file" name="uye_resim" >
								  

							</div>
							<div class="mt-10">
								<input type="email" name="uye_mail" placeholder="Mail Adresiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail Adresiniz'"
								 required class="single-input">
							</div>
								<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select">
											<select name="uye_istek"  >
												<option  value="">Olmak İstediğiniz Yazar Türü</option>
									<option value="1">Uzman</option>
									<option value="2">Usta</option>
									<option value="3">Çırak</option>
									</select>
								</div>
							</div>

							<div class="mt-10">
								<input type="text" name="uye_instagram" placeholder="İnstagram Adresiniz(İsteğe Bağlı) " onfocus="this.placeholder = ''" onblur="this.placeholder = 'İnstagram Adresiniz(İsteğe Bağlı)'"
								  class="single-input">


							</div>
							<input type="hidden" name="uye_durum" value="1">
							<input type="hidden" name="uye_unvan" value="1">
							<input type="hidden" name="uye_zaman" value="<?php echo date('d.m.Y'); ?>">
							<div class="mt-10">
								<input type="text" name="uye_facebook" placeholder="Facebook Adresiniz(İsteğe Bağlı)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Facebook Adresiniz(İsteğe Bağlı)'"
								 class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="uye_twitter" placeholder="Twitter Adresiniz(İsteğe Bağlı)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Twitter Adresiniz(İsteğe Bağlı)'"
								 class="single-input">
							</div>
							
							
							
							
							

							<div class="mt-10">
								<textarea class="single-textarea" name="uye_not" placeholder="Not Düşmek İstermisiniz(Uzman veya usta olmak istiyorsanız kendinizden bahsedin okulunuz kitaplarınız vb):" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Not Düşmek İstermisiniz:'"
								></textarea>
							</div>
							<!-- For Gradient Border Use -->
							<!-- <div class="mt-10">
										<div class="primary-input">
											<input id="primary-input" type="text" name="first_name" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
											<label for="primary-input"></label>
										</div>
									</div> -->
								<div class="button-group-align " align="center">
							<br>
<button  type="submit" name="uyekaydet" enctype="multipart/form-data" class="genric-btn primary e-large">Kayıt Oluştur</button>

</div>
						</form>






</div>



					</div>
					
				</div>
			
</div>
			</div>
		
			
			
			
			
			
			
			
		</div>
	</div>
	<!-- End Align Area -->

	<!-- start footer Area -->
	<?php include 'footer.php'; ?>