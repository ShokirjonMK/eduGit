<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<!-- Start Header Here -->
<?php $this->beginBody() ?>
  
<!-- <div class="site-wrap"> -->
<div class="site-wrap">
  

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body">
      
    </div>
  </div>

                      
  <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    
    <div class="container-fluid">
      <div class="d-flex align-items-center">
        
        <div class="site-logo mr-auto w-25"><a href="<?=Url::to('http://edu.loc') ?>">OneSchool</a>
        
        </div>

            <div class="mx-auto text-center">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                  <li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#courses-section" class="nav-link">Courses</a></li>
                  <li><a href="#programs-section" class="nav-link">Programs</a></li>
                  <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
                </ul>
              </nav>
            </div>

            <div class="ml-auto w-25">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">

  <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>

          </ul>
        </nav>
        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
      </div>
      </div>
    </div>
    
  </header>

<!-- End Header Here -->


<!-- Start Container Here -->
     
              <?= Breadcrumbs::widget([
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
              ]) ?>
              <?= Alert::widget() ?>
              <?= $content ?>
     
<!-- End Container Here -->


<!-- Start Footer Here -->
      <footer class="footer-section bg-white">
            <div class="container">
                    <div class="row">
                      <div class="col-md-4">
                        <h3>About OneSchool</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.</p>
                      </div>

                              <div class="col-md-3 ml-auto">
                                <h3>Links</h3>
                                <ul class="list-unstyled footer-links">
                                  <li><a href="#">Home</a></li>
                                  <li><a href="#">Courses</a></li>
                                  <li><a href="#">Programs</a></li>
                                  <li><a href="#">Teachers</a></li>
                                </ul>
                              </div>

                            <div class="col-md-4">
                              <h3>Subscribe</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
                              <form action="#" class="footer-subscribe">
                                <div class="d-flex mb-5">
                                  <input type="text" class="form-control rounded-0" placeholder="Email">
                                  <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
                                </div>
                              </form>
                            </div>

                    </div>

                    <div style=" text-center">Our Address </div>
                  <div class="row pt-1 mt-1 text-center">
                      
                    <div class="col-md-12">
                      

                      <div class="border-top pt-5">
                      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A16883915e3e3f36b1af48e28afe9948e1453e37d1c0dede94814c65b049dcf34&amp;width=100%25&amp;height=240&amp;lang=en_FR&amp;scroll=true"></script>
                      
                      </div>
                    </div>
                    
                  </div>
                </div>
          </footer>
<!-- End Footer Here -->

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
