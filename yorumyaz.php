<?php include 'header.php' ;
ob_start();
session_start();

if(isset($_SESSION['uye_mail']))
{$uyemail=$_SESSION['uye_mail'];
    $uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:mail ");
$uyesor->execute(array('mail'=>$uyemail));
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);
};

$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ");
$kategorisor->execute(array());

date_default_timezone_set('Europe/Istanbul');

$date=date('d F Y');
 $ing_aylar = array("January","February","March","May","April","June","July","August","September","October","November","December");
    $tr_aylar = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
    
  $date = str_replace($ing_aylar,$tr_aylar,$date);




$vitrinsor=$db->prepare("SELECT * FROM vitrin where vitrin_baslik=:vitrin_baslik");

$vitrinsor->execute(array('vitrin_baslik' => $_POST['vitrin_baslik']));

$vitrincek=$vitrinsor->fetch(PDO::FETCH_ASSOC);


?>
    <!-- End header Area -->

    <!-- Start banner Area -->
    
    <!-- End banner Area -->

    <!-- Blog Area -->
    <section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">



<?php if ($uyecek['uye_unvan']==5 or$uyecek['uye_unvan']==4 ) 
{
if ($_GET['d']=="yeni") {   ?><!--********************* YENİ VİTRİN SAYFASI OLUŞTURMAK İÇİN KULLANILAN ALANNN********BAŞLAGIÇ******** -->
   

<form action="admin/netting/islem.php" method="POST" enctype="multipart/form-data">
                         


                        <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">

                        

                                                
<input type="hidden" value="1" name="vitrin_yayin">
 <!-- Vitrinde Gözüksünmü ayari 0 Gözükmüyor 1 Gözüküyor  -->   
                             
             <input type="hidden" value="<?php echo $uyecek['uye_mail'] ?>" name="vitrin_vyazar">                


    


             <h4><input type="text" name="vitrin_baslik" placeholder="Kitabın Adı"><br /><input type="text" name="vitrin_kyazar" placeholder="Kitabın Yazarı"></h4>



                        <div class="single-element-widget mt-30">
                           
                            <div class="default-select" id="default-select">
                                        <select name="vitrin_tur">
                                                <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($kategoricek['kategori_kimin']=="KATEGORİLER") {  ?>
                                               
                                                    <option value="<?php echo $kategoricek['kategori_ad']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option> 
                                                  <?php }} ?>
                                          
                                
                                </select>
                            
                         

                            </div>
                        </div>

<div class="mt-20">
    
<input type="date" name="vitrin_tarih" placeholder="Kitabın Yazıldığı Tarih">

</div>

<div class="mt-10">
                          <textarea maxlength="100" name="vitrin_description"  class="single-textarea" placeholder="Gösterim Ekranı Açıklaması" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Gösterim Ekranı Açıklaması '"
                                 ></textarea>

                            </div>
<div class="mt-10">
                                <label for="uye_resim" >Gösterim Ekranı Resmi</label>
                                <input type="file" name="vitrin_dresim" >

                        </div>





                        <div class="mt-30" align="center">
<button type="submit" enctype="multipart/form-data" class="genric-btn primary e-large" name="vitringonder">Vitrin Oluştur</button>
</div>
</form>
<!--********************* YENİ VİTRİN SAYFASI OLUŞTURMAK İÇİN KULLANILAN ALANNN********BİTİŞ******** -->

<?php }else/* normal yorum yapmak için girilen alan*/{ ?>










        <!--************* NORMAL UZMAN YORUMU*** BAŞLANGIÇ******-->
        <?php if ($uyecek['uye_unvan']==5 or $uyecek['uye_unvan']==3) { ?>
                                 


<form action="admin/netting/islem.php" method="POST" enctype="multipart/form-data">

 <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">
                       <div class="mt-10">
<label for="uye_resim" >Sayfa İçi Başlık Resmi Yukarıdaki Alan İçin</label>
                                <input type="file" name="uzman_iresim" >
 </div>
                                  <div class="col-md-6">
                        <h4><?php echo $vitrincek['vitrin_baslik'] ?><br/><?php echo $vitrincek['vitrin_kyazar']; ?></h4>
</div>
                           <div class="user_details">
                            <div class="float-left">
                                <a href=""><?php echo $vitrincek['vitrin_tur']; ?></a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $date; ?></h5>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>



                        
                            <p class="mb-0"><textarea onkeyup="textarea(this);" maxlength="2000" name="uzman_yorum"  class="single-textarea" placeholder="Kitap Hakkındaki Yorumunuzu Yazabilirsiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kitap Hakkındaki Yorumunuzu Yazabilirsiniz'"
                                 ></textarea></p>
                                 <script >
                                     function textarea(box){
box.style.height = box.scrollHeight+'px';
}
                                 </script>







                    
                        <blockquote class="blockquote"> <p class="mb-0"><textarea maxlength="250" name="uzman_suslu"  class="single-textarea" placeholder="Kitap Hakkında Önemli Gördüğünüz Veya Alıntı Yapmak İstediğiniz Şeyleri Yazarbilirsiniz " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kitap Hakkında Önemli Gördüğünüz Veya Alıntı Yapmak İstediğiniz Şeyleri Yazarbilirsiniz '"
                                 ></textarea></p></blockquote>


                                  
        <input type="hidden" name="uzman_seourl" value="<?php echo $vitrincek['vitrin_baslik'] ?>">
       <input type="hidden" name="uzman_tarih" value="<?php echo $date ?>">
       <input type="hidden" name="uzman_yayin" value="0">


                                  
                            <input type="hidden" name="uzman_yyazar" value="<?php echo $uyecek['uye_mail'] ?>">
  <div class="mt-30">
                        <div align="center">
                           <button type="submit" enctype="multipart/form-data" class="genric-btn primary e-large" name="yorumyazuc">YORUMU YAYINLA</button>
                             </div>
                             </div>
                        </form>
                  



        <!--************* NORMAL UZMAN YORUMU*** BİTİŞ******-->






        <!--************* NORMAL USTA YORUMU*** BAŞLANGIÇ******-->
<?php }elseif($uyecek['uye_unvan']==4 or $uyecek['uye_unvan']==2){ ?>
        
<form action="admin/netting/islem.php" method="POST" enctype="multipart/form-data">

 <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">
                       <div class="mt-10">

                                
 </div>
                                  <div class="col-md-6">
                        <h4><?php echo $vitrincek['vitrin_baslik'] ?><br/><?php echo $vitrincek['vitrin_kyazar']; ?></h4>
</div>
                           <div class="user_details">
                            <div class="float-left">
                                <a href=""><?php echo $vitrincek['vitrin_tur']; ?></a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $date; ?></h5>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>



                        
                            <p class="mb-0"><textarea onkeyup="textarea(this);" maxlength="2000" name="usta_yorum"  class="single-textarea" placeholder="Kitap Hakkındaki Yorumunuzu Yazabilirsiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kitap Hakkındaki Yorumunuzu Yazabilirsiniz'"
                                 ></textarea></p>
                                 <script >
                                     function textarea(box){
box.style.height = box.scrollHeight+'px';
}
                                 </script>





<div class="mt-10">
<label for="uye_resim" >Sayfa İçi Başlık Resmi Seçiniz</label>
                                <input type="file" name="usta_kresim" >
 </div>

                    
                        


                                  
        <input type="hidden" name="usta_seourl" value="<?php echo $vitrincek['vitrin_baslik'] ?>">
       <input type="hidden" name="usta_tarih" value="<?php echo $date ?>">
       <input type="hidden" name="usta_yayin" value="0">


                                  
                            <input type="hidden" name="usta_yyazar" value="<?php echo $uyecek['uye_mail'] ?>">
  <div class="mt-30">
                        <div align="center">
                           <button type="submit" enctype="multipart/form-data" class="genric-btn primary e-large" name="yorumyaziki">YORUMU YAYINLA</button>
                             </div>
                             </div>
                        </form>










<?php } } }?>

       <!--************* NORMAL USTA YORUMU*** BİTİŞ******-->



</div></div>

 <?php include 'kimlikbar.php'; ?>
    <!-- Blog Area -->

            </div>
        </div>
    </div>
            </div>
        </div>
    </section>
    <!-- Blog Area -->

    <!-- start footer Area -->
   <?php include 'footer.php'; ?>