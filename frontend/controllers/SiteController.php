<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginGuest;
use common\models\LoginForm;
use common\models\Guest;
use common\models\Teacher;
use common\models\Message;
use common\models\Course;
use common\models\LoginTeacher; 
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout', 'signup'],
                    'rules' => [
                        [
                            'actions' => ['signup'],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ];
        }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [ 
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $cmodel = Course::find()->all();
        $messagemodel = new Message();
        if( $messagemodel->load(Yii::$app->request->post()) ) {
            $messagemodel->datetime = date('Y-m-d H:i:s');

              
            $value = Yii::$app->mailer->compose()
            ->setFrom(['mkshokirjon@gmail.com' => 'Web Developer'])
            ->setTo($messagemodel->email)
            ->setSubject($messagemodel->subject)
            ->setTextBody('Hi '.$messagemodel->first_name.' Thank you for Contact Us! We connect with you as soon as possible.')
            ->send();

            $messagemodel->save();
            return $this->refresh();
        }
        else {
            
        }
        
        $pagination = new Pagination([
            'defaultPageSize'=> 3,
            'totalCount' => Teacher::find()->count()
        ]);

        $tmodel = Teacher::find()
        ->limit($pagination->limit)
        ->offset($pagination->offset);
        ;
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('profile');
        } else {
            
            $model->password = '';

            return $this->render('index', [
                'model' => $model,
                'cmodel' => $cmodel,
                'messagemodel' => $messagemodel,
                'tmodel' => $tmodel->all(),
                'pagination' => $pagination
            ]);
        }
    
    }

    public function actionPdf(){

        $this->layout = 'pdf';

        return $this->render('pdf');
    }

    public function actionMail(){
       $result = Yii::$app->mailer->compose()
        ->setTo('shokirjonmk@mail.ru')
        ->setFrom('mkshokirjon@gmail.com')
        ->setSubject('Test')
        ->setTextBody('asasas')
        ->send();

        if($result){
            return $this->redirect('index');
        }
    }

    public function actionGuest()
    {

        $this->layout = 'userlayout';
/*
        $model = new Guest();
        $log = Guest::find()->where(['username' => $model->username])->one();
        if ( $model->load(Yii::$app->request->post())) {
            if ($model->password == Guest::find()->where(['username' => $model->username])->one()) {

                return $this->redirect('profile');
            }
        }
        else {
            
            $model->password = '';
 
            return $this->render('guestlogin', [
                'model' => $model,
            ]);
        }
        */
        $model = new LoginGuest();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('site/profile');
        } else {
            
            $model->password = '';

            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionProfile()
    {
       $this->layout = 'uselayout';
       $user=\common\models\User::find()
            ->where(['=', 'user.id', Yii::$app->user->id])
            ->one();
            
            // var_dump($user);
            // exit;

    //    if (Yii::$app->user->isGuest) {
    //     return $this->goHome();
    //     }
        // if ( Yii::$app->user->can('student')) {
            return $this->render('profile', [
                'user'=>$user,
            ]);            
        // }
    }

    public function actionTeacherLogin()
    {
       $this->layout = 'userlayout';

       $model = new LoginForm();
       if ( $model->load(Yii::$app->request->post()) && $model->login() ) {
           return $this->redirect('profile');
       } else {
           
           $model->password = '';

           return $this->render('teacherlogin', [
               'model' => $model,
           ]);
       }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        // $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     return $this->redirect('profile');
        // } else {
        //     $model->password = '';

        //     return $this->render('login', [
        //         'model' => $model,
        //     ]);
        // }
        return $this->redirect(Url::to('http://edu.loc'));
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'uselayout';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
