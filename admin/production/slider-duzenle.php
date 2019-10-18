<?php include 'header.php';
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");

$slidersor->execute(array(

'id' => $_GET['slider_id']
));


$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
             
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Genel sliderlar <small>  

                      <?php if ($_GET['durum']=='ok') {?>

                          <b style="color:green;">İşlem başarılı..</b>


                          <?php } elseif ($_GET['durum']=='no') {?>

                            <b style="color:red;">İşlem başarısız...</b>

                          <?php }

                          ?>
                           </small>




                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                
            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Slider Resim<br><span class="required">*</span>
                 <div class="col-md-12 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($slidercek['slider_resimyol'])>0) {?>

                    <img width="200"  src="../../<?php echo $slidercek['slider_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../dimg/logoyok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" id="first-name" name="slider_eski" value="<?php echo $slidercek['slider_resimyol'] ?>"  class="form-control col-md-7 col-xs-12">
                    <input type="file"  enctype="multipart/form-data" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
                    <input type="hidden" name="slider_id" value="<?php echo $_GET['slider_id'];?>">

                  </div>
                </div>

                

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="sliderduzenle1" enctype="multipart/form-data" class="btn btn-primary">Güncelle</button>
                </div>

              </form>
                    









                    <form action="../netting/islem.php" id="demo-form2" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_ad" value="<?php echo $slidercek['slider_ad'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Link<span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value ="<?php echo $slidercek['slider_link'] ?>"name="slider_link"  class="form-control col-md-7 col-xs-12">

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira']  ?>" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" name="slider_id" value="<?php echo $_GET['slider_id'];?>">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
                        </label>


                     <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="slider_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($slidercek['slider_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  <!-- <?php 

                   if ($kullanicicek['kullanici_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->


                 </select>
               </div>
                   </div>   
                  
                     


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="sliderduzenle2" enctype="multipart/form-data" class="btn btn-primary">Güncelle</button>
                           </div>
                      </div>
                       

                    </form>
                  </div>
                </div>
              </div>
            </div>
<hr>
<hr>
<hr>

       <<?php include'footer.php'; ?>
    <!-- /Starrr -->
  </body>
</html>
