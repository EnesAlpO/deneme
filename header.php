<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php ob_start();
session_start();
include 'admin/netting/baglan.php';
include 'admin/production/fonksiyon.php';
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
	));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$menusor=$db->prepare("SELECT * FROM menu order by menu_sira");
$menusor->execute(array());

$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ");
$kategorisor->execute(array());





$uyemail=$_SESSION['uye_mail'];
$uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:mail ");
$uyesor->execute(array('mail'=>$uyemail));
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);
 
 ?>
 








<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>IdentityOfBooks</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Rubik:500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
			<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<!--================ Start header Top Area =================-->
	<section class="header-top">
		<div class="container box_1170">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6 col-md-4 col-sm-6">
					<a href="index.php" class="logo">
						<img src="<?php  echo $ayarcek['ayar_logo']; ?>" alt="">
					</a>
</div>
<div class="button-group-align  ">
	<?php if(isset($_SESSION['uye_mail'])){ ?>
	<a href="yazar.php" class="genric-btn primary circle"><?php echo $uyecek['uye_ad']."&emsp;".$uyecek['uye_soyad'] ?></a>
	<?php if($uyecek['uye_unvan']==4 or $uyecek['uye_unvan']==5){ ?>
	<a  href="yorumyaz.php?d=yeni" class="genric-btn primary circle">Yeni Kitap Yorumu Yap</a>
<?php } ?>
<a href="logout.php" class="genric-btn primary-border circle">Çıkış Yap</a>

  <?php }







  else{?>
<a href="kayitgiris.php" class="genric-btn primary">Giriş Yap<span>&emsp;&emsp;</span>Kayıt Oluştur</a>
<?php } ?>







</div>



			</div>

		</div>
	</section>
	<!--================ End header top Area =================-->

	<!-- Start header Area -->
	<header id="header">
		<div class="container box_1170 main-menu">
			<div class="row align-items-center justify-content-center d-flex">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<!-- MENÜ DÜZENLEME ADMİN PANELDEN-->
<!--Alt Sınıflı menümü yoksa normal menümü kontrolü -->

							<?php while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){




							if($menucek['menu_ust']=="1"){ ?>
						<li class="menu-active"><a href="<?php echo $menucek['menu_url']; ?>"><?php echo $menucek['menu_ad']; ?></a></li>
					<?php  }
					else if($menucek['menu_ust']==2) {
						?>
						
						<!--Kategori Adı ile menu adı aynı olmadı alt satır sırası geçerli -->
						<li class="menu-has-children"><a href="<?php echo $menucek['menu_url']; ?>"><?php echo $menucek['menu_ad'] ?></a>
							
							
							<ul>
								<?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>

								<?php if($kategoricek['kategori_kimin']==$menucek['menu_ad']){?>

<li><a href="elements.html">
							<?php 
									echo $kategoricek['kategori_ad'];} ?>
									
								</a></li>
							<?php } ?>
								
							</ul>
						</li>
<?php       } }?>
<!-- MENÜ DÜZENLEME ADMİN PANELDEN-->


						<!--Search alanı-->
						<li>

						<div class="col-lg-6 col-md-6 col-sm-6 search-trigger">
					<a href="#" class="search">
						<i class="lnr lnr-magnifier" id="search"></i></a>
					</a></li>
				</div>
					</ul>
				</nav>
			</div>

			
	
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container box_1170">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End header Area -->