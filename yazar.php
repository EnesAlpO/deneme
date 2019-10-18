<?php include 'header.php' ;
ob_start();
session_start();

if(isset($_SESSION['uye_mail']))
{$uyemail=$_SESSION['uye_mail'];
    $uyesor=$db->prepare("SELECT * FROM uye where uye_mail=:mail ");
$uyesor->execute(array('mail'=>$uyemail));
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);
}

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
                        <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">
                        <h4>Yazarın Yazıları</h4>
                        <p>İstenildiği Takdirde Kendi Ve kitaplar hakkında yorum yapmak için
                            Recently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networksRecently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networks</p>
                        <div class="row">




                    <div class="col-md-6">
                        <div class="single-defination">
                            <a href=""><h4 class="mb-20"><img src="img/blog/news-blog.jpg" width="350" height="300"></h4></a>
                            <p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networks</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-defination">
                          <a href="">  <h4 class="mb-20"><img src="img/blog/news-blog.jpg" width="350" height="300"></h4></a>
                            <p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networks</p>
                        </div>
                    </div>
                 <div class="col-md-6">
                        <div class="single-defination">
                          <a href="">  <h4 class="mb-20"><img src="img/blog/news-blog.jpg" width="350" height="300"></h4></a>
                            <p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networks</p>
                        </div>
                    </div><div class="col-md-6">
                        <div class="single-defination">
                          <a href="">  <h4 class="mb-20"><img src="img/blog/news-blog.jpg" width="350" height="300"></h4></a>
                            <p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to
                                transfer money to them through any US bank or payment system. As a result of this law, most of the popular
                                online casino networks</p>
                        </div>
                    </div>

                </div>
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
                                        <li class="page-item active"><a href="#" class="page-link">01</a></li>
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
                    
                </div>
<?php $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ");
$kategorisor->execute(array()); ?>

<?php include 'kimlikbar.php'; ?>
    <!-- Blog Area -->

    <!-- start footer Area -->
   <?php include 'footer.php'; ?>