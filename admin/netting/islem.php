<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


/* ******KENDİ KODLARIM************* */
/*Kayıt Oluşturma */
if (isset($_POST['uyekaydet'])) {
$uye_maili=$_POST['uye_mail'];
$uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:mail  ");

$uyesor->execute(array(
	'mail'=>$uye_maili
));
$say=$uyesor->rowCount();

if ($say==1) {
header("Location:../../kayitgiris.php?durum=eslesme");
exit;
}


	$uploads_dir = '../../img/kullanici';
	@$tmp_name = $_FILES['uye_resim']["tmp_name"];
	@$name = $_FILES['uye_resim']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2;
	
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

$uyepassword=md5($_POST['uye_sifre']);
$kaydet=$db->prepare("INSERT INTO uye SET
		uye_ad=:uye_ad,
		uye_soyad=:uye_soyad,
		uye_mail=:uye_mail,
		uye_unvan=:uye_unvan,
		uye_istek=:uye_istek,
		uye_durum=:uye_durum,
		uye_facebook=:uye_facebook,
		uye_twitter=:uye_twitter,
		uye_instagram=:uye_instagram,
		uye_not=:uye_not,
		uye_zaman=:uye_zaman,
uye_resim=:uye_resim,
uye_sifre=:uye_sifre
		

		");
	$insert=$kaydet->execute(array(
		'uye_ad' => $_POST['uye_ad'],
		'uye_soyad' => $_POST['uye_soyad'],
		'uye_mail' => $_POST['uye_mail'],
		'uye_unvan' => $_POST['uye_unvan'],
		'uye_istek' => $_POST['uye_istek'],
		'uye_durum' => $_POST['uye_durum'],
		'uye_facebook' => $_POST['uye_facebook'],
		'uye_twitter' => $_POST['uye_twitter'],
		'uye_instagram' => $_POST['uye_instagram'],
		'uye_not' => $_POST['uye_not'],
		'uye_zaman' => $_POST['uye_zaman'],
		'uye_resim' =>$refimgyol,
		'uye_sifre'=>$uyepassword

		));

	if ($insert) {

		Header("Location:../../kayitgiris.php?durum=yes");

	} else {

		Header("Location:../../kayitgiris.php?durum=no");
	}
}

/*************giriş yap****************/
if (isset($_POST['uyegiris'])) {
 

echo $uye_mail=$_POST['uye_mail'];
echo $uye_sifre=md5($_POST['uye_sifre']);


$uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:mail and uye_sifre=:sifre and uye_durum=:durum ");

$uyesor->execute(array(
	'mail'=>$uye_mail,
'sifre'=>$uye_sifre,
'durum' =>1
));
$say=$uyesor->rowCount();




if ($say==1) {
	$_SESSION['uye_mail']=$uye_mail;
	header("Location: ../../index.php");

	
}
else
{
header("Location: ../../kayitgiris.php?durum=yanlis");
exit;
}




}


/*****************************************XXX Vitrin Ayarlari XXX**********(5 ve 4 Numaralı yetkiye sahip yazarların vitrin oluşturması)****************/
if (isset($_POST['vitringonder'])) {

/* Vitrin Resimlri Farklı Yere Yorum İçi Yorum Farklı Yere Yüklenicek İleride Ayarla */

$uploads_dir = '../../img/vitrin';
	@$tmp_name = $_FILES['vitrin_dresim']["tmp_name"];
	@$name = $_FILES['vitrin_dresim']["name"];



	
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2;


	

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

$seourl=explode(" ",$_POST['vitrin_baslik']);
                                $seourlsayisi=count($seourl);
                                $realseourl='';



                            for($i=0;$i<$seourlsayisi;++$i){
                                    $realseourl .= $seourl[$i];
                                  }           



$kyorumkaydet=$db->prepare("INSERT INTO vitrin SET
						vitrin_baslik=:vitrin_baslik,
						vitrin_kyazar=:vitrin_kyazar,
							vitrin_tur=:vitrin_tur,
						vitrin_description=:vitrin_description,
							vitrin_dresim=:vitrin_dresim,
						vitrin_seourl=:vitrin_seourl,
						vitrin_yayin=:vitrin_yayin,
						vitrin_tarih=:vitrin_tarih

					");
				$insert=$kyorumkaydet->execute(array(
					'vitrin_baslik'=>$_POST['vitrin_baslik'],
					'vitrin_kyazar'=>$_POST['vitrin_kyazar'],
					'vitrin_tur'=>$_POST['vitrin_tur'],
					'vitrin_description'=>$_POST['vitrin_description'],
					'vitrin_dresim'=>$refimgyol,
					'vitrin_seourl'=>$realseourl,
					'vitrin_yayin'=>$_POST['vitrin_yayin'],
					'vitrin_tarih'=> $_POST['vitrin_tarih']
));

				



					


if ($insert==1) {
	header("Location:../../index.php");
	# code...
}
else 
{
	echo "başarısız";
}
}
/********************************XXX VİTRİN AYARLARI BİTİŞ XXX************************************/

/**************BAŞLANGIÇ*******************---- 3 Nuamaralı Uzman yorum ekleme---------*********************/
if (isset($_POST['yorumyazuc'])) {

/* Vitrin Resimlri Farklı Yere Yorum İçi Yorum Farklı Yere Yüklenicek İleride Ayarla */

if(isset($_POST['uzman_iresim'])){


$uploads_dir = '../../img/uzman';
	@$tmp_name = $_FILES['uzman_iresim']["tmp_name"];
	@$name = $_FILES['uzman_iresim']["name"];



	
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2;


	

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}
else
{
$refimgyol="Otomatik iç Resim";

}
$seourl=explode(" ",$_POST['uzman_seourl']);
                                $seourlsayisi=count($seourl);
                                $realseourl='';



                            for($i=0;$i<$seourlsayisi;++$i){
                                    $realseourl .= $seourl[$i];
                                  }           



$kyorumkaydet=$db->prepare("INSERT INTO uzman SET
						uzman_yorum=:uzman_yorum,
						uzman_suslu=:uzman_suslu,
							uzman_tarih=:uzman_tarih,
						uzman_yyazar=:uzman_yyazar,
							uzman_iresim=:uzman_iresim,
						uzman_yayin=:uzman_yayin,
						uzman_seourl=:uzman_seourl

					");
				$insert=$kyorumkaydet->execute(array(
					'uzman_yorum'=>$_POST['uzman_yorum'],
					'uzman_suslu'=>$_POST['uzman_suslu'],
					'uzman_tarih'=>$_POST['uzman_tarih'],
					'uzman_yyazar'=>$_POST['uzman_yyazar'],
					'uzman_iresim'=>$refimgyol,
					'uzman_yayin'=>$_POST['uzman_yayin'],
					'uzman_seourl'=>$realseourl
));

				



					


if ($insert==1) {
	header("Location:../../index.php");
	# code...
}
else 
{
	echo "başarısız";
}
}




/**************BİTİŞ*******************---- 3 Nuamaralı Uzman yorum ekleme---------*********************/






/**************BAŞLANGIÇ*******************---- 2 Nuamaralı Uzman yorum ekleme---------*********************/



if (isset($_POST['yorumyaziki'])) {

/* Vitrin Resimlri Farklı Yere Yorum İçi Yorum Farklı Yere Yüklenicek İleride Ayarla */

if(isset($_POST['usta_kresim'])){


$uploads_dir = '../../img/usta';
	@$tmp_name = $_FILES['usta_kresim']["tmp_name"];
	@$name = $_FILES['usta_kresim']["name"];



	
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2;


	

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}
else
{
$refimgyol="Otomatik iç Resim";

}
$seourl=explode(" ",$_POST['usta_seourl']);
                                $seourlsayisi=count($seourl);
                                $realseourl='';



                            for($i=0;$i<$seourlsayisi;++$i){
                                    $realseourl .= $seourl[$i];
                                  }           



$kyorumkaydet=$db->prepare("INSERT INTO usta SET
						usta_yorum=:usta_yorum,
							usta_tarih=:usta_tarih,
						usta_yyazar=:usta_yyazar,
							usta_kresim=:usta_kresim,
						usta_yayin=:usta_yayin,
						usta_seourl=:usta_seourl

					");
				$insert=$kyorumkaydet->execute(array(
					'usta_yorum'=>$_POST['usta_yorum'],
					'usta_tarih'=>$_POST['usta_tarih'],
					'usta_yyazar'=>$_POST['usta_yyazar'],
					'usta_kresim'=>$refimgyol,
					'usta_yayin'=>$_POST['usta_yayin'],
					'usta_seourl'=>$realseourl
));

				



					


if ($insert==1) {
	header("Location:../../index.php");
	# code...
}
else 
{
	echo "başarısız";
}
}



/**************Bitiş*******************---- 2 Nuamaralı Uzman yorum ekleme---------*********************/



/* **********KENDİ KODLARIM SONU************* */

if (isset($_POST['kullanicikaydet'])) {

	
	echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

	echo $kullanici_passwordone=$_POST['kullanici_passwordone']; echo "<br>";
	echo $kullanici_passwordtwo=$_POST['kullanici_passwordtwo']; echo "<br>";


	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if ($kullanici_passwordone>=6) {


// Başlangıç

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
	}
	


}





if (isset($_POST['sliderduzenle'])) {

//Slider düzenleme işlemi için örnek başlangıç
	if($_FILES['slider_resimyol']["size"] > 0)  {



	} else {


	} 



}



if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../dimg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
		));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}






if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../img';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genelayarlar.php?durum=ok");

	} else {

		Header("Location:../production/genelayarlar.php?durum=no");
	}

}


if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}




if (isset($_POST['kullanicigiris'])) {


	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../?durum=basarisizgiris");

	}


}






if (isset($_POST['genelayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
		));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}



if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
		));


	if ($update) {

		header("Location:../production/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
	
}


if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
		));


	if ($update) {

		header("Location:../production/api-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/api-ayarlar.php?durum=no");
	}
	
}


if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	/*

	copy paste işlemlerinde tablo ve işaretli satır isminin değiştirildiğinden emin olun!!!

	*/
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}



if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../production/kullanici.php?sil=ok");


	} else {

		header("location:../production/kullanici.php?sil=no");

	}


}


if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}


if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {


		header("location:../production/menu.php?sil=ok");


	} else {

		header("location:../production/menu.php?sil=no");

	}


}


if (isset($_POST['menukaydet'])) {


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}





if (isset($_POST['kategoriekle'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}



if ($_GET['kategorisil']=="ok") {
	
	$sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
		));

	if ($kontrol) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}

if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
		));

	if ($kontrol) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}


if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
		));

	if ($kontrol) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}

if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
		));

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}


if (isset($_POST['urunekle'])) {

	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl
			
		));

	if ($insert) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}
if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($update) {

		Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}
if (isset($_POST['urunduzenle'])) {

	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
	
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
	
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl
			
		));

	if ($update) {

		Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
	}

}

?>