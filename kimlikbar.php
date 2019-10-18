<div class="col-lg-4 sidebar">
                <div class="single-widget protfolio-widget">
                        <img class="img-fluid" src="<?php echo $uyecek['uye_resim']; ?>" alt="">

                        <a href="#">
                            <h4><?php echo $uyecek['uye_ad']."&emsp;".$uyecek['uye_soyad'] ?></h4>

                        </a>

                        <p class="p-text"><?php if(empty($uyecek['uye_desciription']))
                        {
                            echo "tanımlama yapılmamıştır";
                        }
                        else   {echo $uyecek['uye_desciription'];}
                        ?>
                        </p>
                       
  <ul class="social-links">
                            <li><a href="<?php echo $uyecek['uye_facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $uyecek['uye_twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $uyecek['uye_instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                
  <fieldset class="rating"> <!-- Yıldız oranını ayarla php echo checked-->


    <input type="checkbox" disabled="" id="star5"  <?php if($uyecek['uye_star']==5)
    echo 'checked=""'; ?> name="rating" value="5" /><label class = "full" for="star5" title="5"></label>
    <input type="checkbox" disabled=""id="star4half"<?php if($uyecek['uye_star']==4.5)
    echo 'checked=""'; ?>  name="rating" value="4.5" /><label class="half" for="star4half" title="4.5"></label>


    <input type="checkbox" disabled=""id="star4" name="rating" value="4"<?php if($uyecek['uye_star']==4)
    echo 'checked=""'; ?>   /><label class = "full" for="star4" title="4"></label>


    <input type="checkbox"disabled="" id="star3half" name="rating" <?php if($uyecek['uye_star']==3.5)
    echo 'checked=""'; ?> value="3 and a half" /><label class="half" for="star3half" title="3.5"></label>

    <input type="checkbox"disabled=""  id="star3" <?php if($uyecek['uye_star']==3)
    echo 'checked=""'; ?> name="rating" value="3" /><label class = "full" for="star3" title="3"></label>

    <input type="checkbox" disabled="" id="star2half" <?php if($uyecek['uye_star']==2.5)
    echo 'checked=""'; ?> name="rating" value="2 and a half" /><label class="half" for="star2half" title="2.5"></label>


    <input type="checkbox" disabled=""  id="star2" name="rating" <?php if($uyecek['uye_star']==2)
    echo 'checked=""'; ?> value="2" /><label class = "full" for="star2" title="2"></label>
    <input type="checkbox" disabled="" id="star1half" name="rating"<?php if($uyecek['uye_star']==1.5)
    echo 'checked=""'; ?>  value="1 and a half" /><label class="half" for="star1half" title="1.5"></label>
    <input type="checkbox" disabled=""  id="star1" name="rating" <?php if($uyecek['uye_star']==1)
    echo 'checked=""'; ?>  value="1" /><label class = "full" for="star1" title="1 "></label>
    <input type="checkbox"  disabled="" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="0.5"></label>

</fieldset>
 <p><span style="font-size:125%;color:red;">&emsp; &emsp;&emsp;&emsp;&emsp;&#10084;</span><?php echo $uyecek['uye_like']; ?> </p>




                    </div>
    
                    <div class="single-widget popular-posts-widget">
                        <div class="jq-tab-wrapper" id="horizontalTab">
                            <div class="jq-tab-menu">

                                <div class="jq-tab-title " data-tab="1">Yazarın Popüler Yorumları</div>
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
                        <h4 class="title">Yazarın Listeleri </h4>
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