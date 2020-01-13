<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Visit My Profile';
?>

  <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
<!-- Form -->
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="500">

                    <?php $form = ActiveForm::begin(
                                ['options' => ['class' => 'form-box'],]
                                    ); ?>
                        <h3 class="h4 text-black mb-4">Log In</h3>
                  <div class="form-group">
                      
                        <?= $form->field($model, 'username', ['inputOptions' => ['class' => 'form-control' , 'placeholder'=>'Username','required'=>'required'],])->textInput(['autofocus' => true])->label(false);  ?>
                  </div>
                  <div class="form-group">
                        <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control' , 'placeholder'=>'Password','required'=>'required'],])->passwordInput()->label(false);  ?>
                  </div>
                  <div class="form-inline">
                      <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'mr-5 pl-3'],])->checkbox() ?>
                      <?= Html::submitButton('Log in', ['class' => 'btn btn-primary btn-pill mb-3 ml-5', 'name' => 'login-button']) ?>
                  </div>
                  <div style="color:#999;margin:1em 0">
                      If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                      <br>
                      Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                  </div>   
                    
                      <?php ActiveForm::end(); ?>
                  
                </div>
                  <!-- Form -->

                <div class="col-lg-6 mb-4 ml-5">
                  <h1  data-aos="fade-up" data-aos-delay="100">Hello Teacher! </h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="<?= Url::to('https://edu.loc') ?>" class="btn btn-primary py-3 px-5 btn-pill">Go Back site</a></p>

                </div>
 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  