<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Message;

$this->title = 'Edu';
?>

<div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Log In for as a Teacher</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="<?=Url::to('site/teacher-login')?>" class="btn btn-primary py-3 px-5 btn-pill">Teacher</a></p>

                </div>
<!-- Form -->
    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                <?php $form = ActiveForm::begin(
                  [
                    'options' => [
                      'class' => 'form-box'
                    ],
                  ]
                      ); ?>
        <h3 class="h4 text-black mb-4">Log In</h3>
      <div class="form-group">
         
          <?= $form->field($model, 'username', ['inputOptions' => ['class' => 'form-control' , 'placeholder'=>'Username','required'=>'required'],])->label(false);  ?>
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
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">
            <?
            foreach ($cmodel as $course) {
              echo '<div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">';
              echo '<a href="#"><img src="images/'.$course->course_img.'" alt="Image" class="img-fluid"></a>
              </figure>';
              echo '<div class="course-inner-text py-4 px-4">
                <span class="course-price">$'.$course->course_prise.'</span>' ;
              echo '<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>';
              echo '<h3><a href="#">'.$course->course_name.'</a></h3>';
              echo '<p>'. \yii\helpers\StringHelper::truncate($course->course_info, 100, '...').'</p>';
              echo '</div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>';

            }           
            ?>

          </div>

         

        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Our Programs</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">We Are Excellent In Education</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/undraw_teaching.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Strive for Excellent</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/undraw_teacher.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Education is life</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="site-section" id="teachers-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Our Teachers</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
          </div>
        </div>

        <div class="row">
        <? foreach ($tmodel as $teacher) {
          echo '<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">';
          echo '<img src="../backend/web/uploads/'.$teacher->teacher_img.'" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">';
          echo '<div class="py-2">';
          echo '<h3 class="text-black">'.$teacher->full_name.'</h3>';
          echo '<p class="position">'.$teacher->subject.'</p>';
          echo '<p>'.$teacher->info.'</p>';
          echo '</div></div></div>';
          
          }
        ?>
        </div>
        <?= yii\widgets\LinkPager::widget(['pagination'=>$pagination]);?>

     
      </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Jerome Jensen</h3>
            <blockquote>
              <p>&ldquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem soluta sit eius necessitatibus voluptate excepturi beatae ad eveniet sapiente impedit quae modi quo provident odit molestias! Rem reprehenderit assumenda &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Why Choose Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">150 Universities Worldwide</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Top Professionals in The World</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Expand Your Knowledge</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Best Online Teaching Assistant Courses</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Best Teachers</h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    



    <div class="site-section bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7">


            
            <h2 class="section-title mb-3">Message Us</h2>
            <p class="mb-5">Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.</p>
          
            <? $form = ActiveForm::begin(['options'=>['data-aos'=>'fade']]); ?>
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <?= $form->field($messagemodel, 'first_name', ['inputOptions' => ['class' => 'form-control' , 'placeholder' => 'First Name', 'required'=>'required']])->label(false);?>
                </div>
                  <div class="col-md-6">
                <?= $form->field($messagemodel, 'last_name', ['inputOptions' => ['class' => 'form-control' , 'placeholder' => 'Last Name', 'required'=>'required']])->label(false);?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                <?= $form->field($messagemodel, 'subject', ['inputOptions' => ['class' => 'form-control' , 'placeholder' => 'Subject', 'required'=>'required']])->label(false);?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                <?= $form->field($messagemodel, 'email', ['inputOptions' => ['type'=> 'email', 'class' => 'form-control' , 'placeholder' => 'Email', 'required'=>'required']])->label(false);?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                <?= $form->field($messagemodel, 'message_body', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Write your message here.', 'required'=>'required']])->textarea(['rows' => '6', 'cols' => "30"])->label(false);?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                <?= Html::submitButton('Send Message', ['class' => 'btn btn-primary py-3 px-5 btn-block btn-pill']); ?>
                </div>
              </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    </div>