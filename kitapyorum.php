<?php include 'header.php' ;?>
    <!-- End header Area -->
<?php 

$vitrinlerisor=$db->prepare("SELECT * FROM vitrin where vitrin_seourl=:vitrin_seourl");

$vitrinlerisor->execute(array('vitrin_seourl' => $_GET['sef']));

$vitrinlericek=$vitrinlerisor->fetch(PDO::FETCH_ASSOC);
date_default_timezone_set('Europe/Istanbul');
$date=date('d F Y');
 $ing_aylar = array("January","February","March","May","April","June","July","August","September","October","November","December");
    $tr_aylar = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
    
  $date = str_replace($ing_aylar,$tr_aylar,$date);




 ?>
    <!-- Start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container box_1170">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Okumak İstediğiniz Yazar Türünü Seçin 
                    </h1>
                    <p class="text-white link-nav"><a href="?duzey=uzman">Uzman </a> <span class="lnr lnr-pencil  "></span>
                        <a href="?duzey=usta"> Usta</a> <span class="lnr lnr-pencil  "></span>
                      
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Blog Area -->



<!-- Kitabın Değişmez Bilgileri -->



    <section class="blog_area section-gap single-post-area">

        <div class="container box_1170">

            <div class="row">
                <div class="col-lg-8">
                    


                         

<!-- Kitabın Değişmez Bilgileri -->

    <?php if($_GET['duzey']=="uzman"){





if (!isset($_GET['page'])) {
    $page=1;
}
else
{
    $page=$_GET['page'];
}

$starting_limit=($page-1)*1;


$sayisi="SELECT * FROM uzman where uzman_seourl=:uzman_seourl ";


$sayisisor=$db->prepare($sayisi);

$sayisisor->execute(array('uzman_seourl' => $_GET['sef']));
$toplam_yorum=$sayisisor->rowCount();
$toplam_sayfa=$toplam_yorum;

$show="SELECT * FROM uzman where uzman_seourl=:uzman_seourl order by id DESC LIMIT $starting_limit,1";



$uzmansor=$db->prepare($show);

$uzmansor->execute(array('uzman_seourl' => $_GET['sef']));





while ($uzmancek=$uzmansor->fetch(PDO::FETCH_ASSOC)) { $yorumyazar=$uzmancek['uzman_yyazar']; ?>
<div class="main_blog_details">
                    <div class="row">
<div class="col-md-12">
                        <img class="img-fluid" src="<?php echo $uzmancek['uzman_iresim']; ?>" alt="">


                        </div>
<div class="col-md-6">
                        <h4><?php echo $vitrinlericek['vitrin_baslik'] ?><br/><?php echo $vitrinlericek['vitrin_kyazar']; ?></h4>
</div>
                        <div class="col-md-6">
                  


<div align="Right" class="button-group-area mt-30">
                    <form action="yorumyaz.php" method="POST" >



                             <input type="hidden" name="vitrin_baslik" value="<?php echo $vitrinlericek['vitrin_baslik'] ?>" >


        <button type="submit" class="genric-btn primary-border circle">Kitap Hakkında Yorum Yap</button>
                    </form>
</div>
</div>
</div>
<div class="user_details">
                            <div class="float-left">
                                <a href="#"><?php echo $vitrinlericek['vitrin_tur']; ?></a>
                               
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $date ?></h5>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>







  
                     </div>









                    <div class="main_blog_details">


                        <p><?php echo $uzmancek['uzman_yorum']; ?></p>
                     </p>
                        <blockquote class="blockquote">
                            <p class="mb-0"><?php echo $uzmancek['uzman_suslu'] ?></p>
                        </blockquote>
                       
                        <div class="news_d_footer">
                            <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>

&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;
                            <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

</fieldset>

                               <div class="news_d ml-auto">
                               <a href="#"><i class="lnr lnr lnr-book"></i>15</a>
                            </div>

                        </div>

                        

        </div>

                      <?php   }//endwhile;;
?><div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a href="#" class="page-link" aria-label="Previous">
                                                <span aria-hidden="true">
                                                    <span class="lnr lnr-arrow-left"></span>
                                                </span>
                                            </a>
                                        </li>
                                   
                                           <?php for($page=1;$page <=$toplam_sayfa;$page++){ ?>
                                        <li class="page-item  "><a href="?duzey=uzman&page=<?php echo $page;  ?> " class="page-link"><?php echo "0".$page?></a></li>
                                  
                                       <?php } ?>
                                       
                                            <a href="#" class="page-link" aria-label="Next">
                                                <span aria-hidden="true">
                                                    <span class="lnr lnr-arrow-right"></span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>


              <?php      }  ?>








<?php if($_GET['duzey']=="usta"){?>
    <!--********************Kitapla İlgili bilgiler başlangıç*************** -->


<div class="main_blog_details">
                    <div class="row">
<div class="col-md-12">
           
                        <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">


                        </div>
<div class="col-md-6">
                        <h4><?php echo $vitrinlericek['vitrin_baslik'] ?><br/><?php echo $vitrinlericek['vitrin_kyazar']; ?></h4>
</div>
                        <div class="col-md-6">
                  


<div align="Right" class="button-group-area mt-30">
                    <form action="yorumyaz.php" method="POST" >



                             <input type="hidden" name="vitrin_baslik" value="<?php echo $vitrinlericek['vitrin_baslik'] ?>" >


        <button type="submit" class="genric-btn primary-border circle">Kitap Hakkında Yorum Yap</button>
                    </form>
</div>
</div>
</div>
<div class="user_details">
                            <div class="float-left">
                                <a href="#"><?php echo $vitrinlericek['vitrin_tur']; ?></a>
                               
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $date ?></h5>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
    </div>
                 







  
   <!--******************** Kitap Bilgi Bitiş**********************-->
           
   <!--******************** Sollu Yorum Sayfası Başlangıç**********************-->
   <?php 
$limit=3;
if (!isset($_GET['page'])) {
    $page=1;
}
else
{
    $page=$_GET['page'];
}

$starting_limit=($page-1)*$limit;


$sayisi="SELECT * FROM usta where usta_seourl=:usta_seourl ";


$sayisisor=$db->prepare($sayisi);

$sayisisor->execute(array('usta_seourl' => $_GET['sef']));
$toplam_yorum=$sayisisor->rowCount();
$toplam_sayfa=ceil($toplam_yorum/$limit);

$show="SELECT * FROM usta where usta_seourl=:usta_seourl order by id DESC LIMIT $starting_limit,$limit";



$ustasor=$db->prepare($show);

$ustasor->execute(array('usta_seourl' => $_GET['sef']));



$i=0; 
while ($ustacek=$ustasor->fetch(PDO::FETCH_ASSOC)) { $yorumyazar=$ustacek['usta_yyazar'];
$i=$i%2;
echo $i;
$uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:uye_mail ");
$uyesor->execute(array('uye_mail'=> $yorumyazar)); 
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);


$i=$i+1;  

if ($i==0) {
    # code...
 ?>

<div class="section-top-border">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/elements/d.jpg" alt="" class="img-fluid">
                    </div>
                        <div class="col-md-3"> 
                        <textarea name="metin_kutusu_1" rows="9" cols="20" > <?php echo $uyecek['uye_description']."$i" ?>  </textarea>
<h5><?php echo $ustalaricek['usta_tarih']; ?></h5>
                            </div>

                            <!-- KişiselBilgileri Girmeye Çalıştığım yer Bşalangıç -->

                    <div class="col-md-3">

                    <img class="img-fluid" src="img/blog/user2.png" alt="">
                    <h4 align="center" class="mt-10 " ><?php echo $uyecek['uye_ad']."&emsp;".$uyecek['uye_soyad']; ?><a href="#" class="social-links"><br> 

                    
                    <a href="<?php echo $uyecek['uye_facebook']; ?>"><i class="fa fa-facebook social-links"></i></a>&emsp;
                            <a href="<?php echo $uyecek['uye_twitter']; ?>"><i class="fa fa-twitter"></i></a>&emsp;
                            <a href="<?php echo $uyecek['uye_instagram']; ?>"><i class="fa fa-instagram"></i></a>&emsp;
                     
<fieldset class="rating  "> <!-- Yıldız oranını ayarla php echo checked-->
<?php $star=$uyecek['uye_star']; ?>
    <input type="checkbox" disabled="" id="star5" name="rating" <?php if ($star==5){echo 'checked=""';
    } ?> value="5" /><label class = "full" for="star5" title="5"></label>

    <input type="checkbox" disabled=""id="star4half" <?php if ($star==4.5){echo 'checked=""';
    } ?> name="rating" value="4 and a half" /><label class="half" for="star4half" title="4.5"></label>

    <input type="checkbox" disabled=""id="star4" <?php if ($star==4){echo 'checked=""';
    } ?> name="rating" value="4"  /><label class = "full" for="star4" title="4"></label>

    <input type="checkbox"disabled="" id="star3half" <?php if ($star==3.5){echo 'checked=""';
    } ?> name="rating" value="3 and a half" /><label class="half" for="star3half" title="3.5"></label>

    <input type="checkbox"disabled=""  id="star3" name="rating" <?php if ($star==3){echo 'checked=""';
    } ?> value="3" /><label class = "full" for="star3" title="3"></label>

    <input type="checkbox" disabled="" id="star2half" name="rating" <?php if ($star==2.5){echo 'checked=""';
    } ?> value="2 and a half" /><label class="half" for="star2half" title="2.5"></label>

    <input type="checkbox" disabled=""  id="star2" <?php if ($star==2){echo 'checked=""';
    } ?> name="rating" value="2" /><label class = "full" for="star2" title="2"></label>

    <input type="checkbox" disabled="" id="star1half" <?php if ($star==1.5){echo 'checked=""';
    } ?>name="rating" value="1 and a half" /><label class="half" for="star1half" title="1.5"></label>

    <input type="checkbox" disabled=""  id="star1" name="rating" <?php if ($star==1){echo'checked=""';
    } ?> value="1" /><label class = "full" for="star1" title="1"></label>

    <input type="checkbox"  disabled="" id="starhalf" <?php if ($star==0.5){echo'checked=""';
    } ?> name="rating" value="half" /><label class="half" for="starhalf" title="0.5"></label>

</fieldset>

<div align="center">
 <p align=><span  style="font-size:125%;color:red;">&emsp; &emsp;&#10084;</span><?php echo $uyecek['uye_like']; ?> </p>
  </div></h4> 


                    </div>
                            <!-- KişiselBilgileri Girmeye Çalıştığım yer Bitiş-->



                    <div class="col-md-12 mt-10">
                        <p><?php echo $ustacek['usta_yorum'] ?></p>

                    </div>
 
<div class="col-md-12" align="Right">
                            <a href="#"><i class="lnr lnr lnr-heart"></i>15 Kişi Beğendi</a>


                            <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

</fieldset>
</div>
    </div>
              </div>






           

   <!--******************** Sollu Yorum Sayfası Bitiş **********************-->
             

     <?php } 
     elseif($i==1){?>

<div class="section-top-border text-right">
                 <div class="row">

                <div class="col-md-3">

                    <img class="img-fluid" src="img/blog/user2.png" alt="">
                    <h4 align="center" class="mt-10 " ><?php echo $uyecek['uye_ad']."&emsp;".$uyecek['uye_soyad']; ?><a href="#" class="social-links"><br> 

                    <a href="<?php echo $uyecek['uye_facebook']; ?>"><i class="fa fa-facebook social-links"></i></a>
                            <a href="<?php echo $uyecek['uye_twitter']; ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo $uyecek['uye_instagram']; ?>"><i class="fa fa-instagram"></i></a>
                     
<fieldset class="rating  "> <!-- Yıldız oranını ayarla php echo checked-->
<?php $star=$uyecek['uye_star']; ?>
    <input type="checkbox" disabled="" id="star5" name="rating" <?php if ($star==5){echo 'checked=""';
    } ?> value="5" /><label class = "full" for="star5" title="5"></label>

    <input type="checkbox" disabled=""id="star4half" <?php if ($star==4.5){echo 'checked=""';
    } ?> name="rating" value="4 and a half" /><label class="half" for="star4half" title="4.5"></label>

    <input type="checkbox" disabled=""id="star4" <?php if ($star==4){echo 'checked=""';
    } ?> name="rating" value="4"  /><label class = "full" for="star4" title="4"></label>

    <input type="checkbox"disabled="" id="star3half" <?php if ($star==3.5){echo 'checked=""';
    } ?> name="rating" value="3 and a half" /><label class="half" for="star3half" title="3.5"></label>

    <input type="checkbox"disabled=""  id="star3" name="rating" <?php if ($star==3){echo 'checked=""';
    } ?> value="3" /><label class = "full" for="star3" title="3"></label>

    <input type="checkbox" disabled="" id="star2half" name="rating" <?php if ($star==2.5){echo 'checked=""';
    } ?> value="2 and a half" /><label class="half" for="star2half" title="2.5"></label>

    <input type="checkbox" disabled=""  id="star2" <?php if ($star==2){echo 'checked=""';
    } ?> name="rating" value="2" /><label class = "full" for="star2" title="2"></label>

    <input type="checkbox" disabled="" id="star1half" <?php if ($star==1.5){echo 'checked=""';
    } ?>name="rating" value="1 and a half" /><label class="half" for="star1half" title="1.5"></label>

    <input type="checkbox" disabled=""  id="star1" name="rating" <?php if ($star==1){echo'checked=""';
    } ?> value="1" /><label class = "full" for="star1" title="1"></label>

    <input type="checkbox"  disabled="" id="starhalf" <?php if ($star==0.5){echo'checked=""';
    } ?> name="rating" value="half" /><label class="half" for="starhalf" title="0.5"></label>

</fieldset>

<div align="center">
 <p align=><span  style="font-size:125%;color:red;">&emsp; &emsp;&#10084;</span><?php echo $uyecek['uye_like'] ?> </p>
  </div></h4> 


                    </div>


 <div class="col-md-3"> 
                        <textarea name="metin_kutusu_1" rows="9" cols="20" readonly>  <?php echo $uyecek['uye_description']."$i"?> </textarea>
<h5><?php echo $ustacek['usta_tarih']; ?></h5>
                            </div>
                
                 <div class="col-md-6" >
                          <img src="img/elements/d.jpg" alt="" class="img-fluid">
                    </div>
                
                <div class="row">
                    <div class="col-md-12 mt-20">
                        <p class="text-right"><?php echo $ustacek['usta_yorum'] ?></p>
                    </div>
                        </div>
                        <div class="col-md-12" align="Right">

                            <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

</fieldset>
                            <a href="#"><i class="lnr lnr lnr-heart"></i>15 Kişi Beğendi</a>



                          

                        </div>
                </div>
            </div>


 

   
            <!--**************** Sağlı Yorum Sayfası Bitiş ****************-->


<?php  }} ?>



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
                                   
                                           <?php for($page=1;$page <=$toplam_sayfa;$page++){ ?>
                                        <li class="page-item  "><a href="?duzey=usta&page=<?php echo $page;  ?> " class="page-link"><?php echo "0".$page?></a></li>
                                  
                                       <?php } ?>
                                       
                                            <a href="#" class="page-link" aria-label="Next">
                                                <span aria-hidden="true">
                                                    <span class="lnr lnr-arrow-right"></span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>


              <?php      }  ?>




                   
                    <!--**ÖN CEKİ SONRAKİ YAZI ALANI
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="#">
                                        <h4>A Discount Toner</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="#">
                                        <h4>Cartridge Is Better</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                -->
      
                                  
                    <?php include 'yorumlar.php'; ?>

                    <div class="comment-form">
                        <h4>Yorum Yapın</h4>
                      
                   
                         
                        <form>
                          
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Başlık" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Yorumunuz"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            
                            <a href="#" class="primary-btn submit_btn text-uppercase">Yorumu Gönder</a>
                            
                        </form>
                    </div>
                </div>
<?php $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ");
$kategorisor->execute(array()); ?>

<div class="col-lg-4 sidebar">
    <?php if ($_GET['duzey']=="uzman") {

$uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:uye_mail ");
$uyesor->execute(array('uye_mail'=> $yorumyazar)); 
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);




        ?>

                <div class="single-widget protfolio-widget">
                        <img class="img-fluid" src="img/blog/user2.png" alt="">


                       
                            <h4><?php echo $uyecek['uye_ad']."&emsp;".$uyecek['uye_soyad']; ?></h4>

                        </a>

                        <p class="p-text">
                          <?php echo $uyecek['uye_description'] ?>
                        </p>
                       
  <ul class="social-links">
    <br><br><br><br>
                            <li><a href="<?php echo $uyecek['uye_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $uyecek['uye_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $uyecek['uye_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                
  <fieldset class="rating  "> <!-- Yıldız oranını ayarla php echo checked-->
<?php $star=$uyecek['uye_star']; ?>
    <input type="checkbox" disabled="" id="star5" name="rating" <?php if ($star==5){echo 'checked=""';
    } ?> value="5" /><label class = "full" for="star5" title="5"></label>

    <input type="checkbox" disabled=""id="star4half" <?php if ($star==4.5){echo 'checked=""';
    } ?> name="rating" value="4 and a half" /><label class="half" for="star4half" title="4.5"></label>

    <input type="checkbox" disabled=""id="star4" <?php if ($star==4){echo 'checked=""';
    } ?> name="rating" value="4"  /><label class = "full" for="star4" title="4"></label>

    <input type="checkbox"disabled="" id="star3half" <?php if ($star==3.5){echo 'checked=""';
    } ?> name="rating" value="3 and a half" /><label class="half" for="star3half" title="3.5"></label>

    <input type="checkbox"disabled=""  id="star3" name="rating" <?php if ($star==3){echo 'checked=""';
    } ?> value="3" /><label class = "full" for="star3" title="3"></label>

    <input type="checkbox" disabled="" id="star2half" name="rating" <?php if ($star==2.5){echo 'checked=""';
    } ?> value="2 and a half" /><label class="half" for="star2half" title="2.5"></label>

    <input type="checkbox" disabled=""  id="star2" <?php if ($star==2){echo 'checked=""';
    } ?> name="rating" value="2" /><label class = "full" for="star2" title="2"></label>

    <input type="checkbox" disabled="" id="star1half" <?php if ($star==1.5){echo 'checked=""';
    } ?>name="rating" value="1 and a half" /><label class="half" for="star1half" title="1.5"></label>

    <input type="checkbox" disabled=""  id="star1" name="rating" <?php if ($star==1){echo'checked=""';
    } ?> value="1" /><label class = "full" for="star1" title="1"></label>

    <input type="checkbox"  disabled="" id="starhalf" <?php if ($star==0.5){echo'checked=""';
    } ?> name="rating" value="half" /><label class="half" for="starhalf" title="0.5"></label>

</fieldset>
 <p><span style="font-size:125%;color:red;">&emsp; &emsp;&emsp;&emsp;&emsp;&#10084;</span><?php echo $uyecek['uye_like'] ?> </p>




                    </div>
    <?php } ?>
                    <div class="single-widget popular-posts-widget">
                        <div class="jq-tab-wrapper" id="horizontalTab">
                            <div class="jq-tab-menu">

                                <div class="jq-tab-title " data-tab="1">Kitapla İlgili Popüler Yorumlar</div>
                                <div class="jq-tab-title " data-tab="2">POPÜLER</div>
                             
                            
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
                        <h4 class="title">Yazar Türleri</h4>
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
            </div>
        </div>
    </section>
    <!-- Blog Area -->

    <!-- start footer Area -->
   <?php include 'footer.php'; ?>