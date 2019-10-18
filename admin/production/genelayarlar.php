<?php include 'header.php';?>
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
                    <h2>Genel Ayarlar <small>  

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
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                
            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($ayarcek['ayar_logo'])>0) {?>

                    <img width="200"  src="../../<?php echo $ayarcek['ayar_logo']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../img/logoyok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="logoduzenle" enctype="multipart/form-data" class="btn btn-primary">Güncelle</button>
                </div>

              </form>
                    









                    <form action="../netting/islem.php" id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_title" value="<?php echo $ayarcek['ayar_title'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Açıklaması<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value ="<?php echo $ayarcek['ayar_description'] ?>"name="ayar_description" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Anahtar Kelime<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords']  ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazar<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_author'] ?>"name="ayar_author" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                  
                     


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncelle</button>
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

       <?php include'footer.php'; ?>
    <!-- /Starrr -->
  </body>
</html>
