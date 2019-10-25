<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Admin;
use app\models\Contactdetails;
use app\models\LoginadminForm;
use app\models\SignupForm;
use app\models\SignupstudentForm;
use app\models\StudForm;
use yii\web\UploadedFile;
use app\models\UploadCanvas;
use app\models\UploadPicture;
use app\models\Picture;
use app\models\Canvas;
use app\models\Teachingplan;
use app\models\UploadTeachingplan;
use app\models\Data;
use app\models\Chatmsg;

class AdminController extends Controller
{
    public $layout = 'admin';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
     * @return string
     */
    public function actionIndex()
    {

        if (!\Yii::$app->user->isGuest) {
            if (!\Yii::$app->user->can('roleRoot')) {
                //return Yii::$app->response->redirect(['site/stud']);
                return $this->render('index');
            } 
        } 
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
            
        }

        $model = new LoginadminForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (\Yii::$app->user->can('roleStud')) {
                //return '123';
                return Yii::$app->response->redirect(['site/index']);
            } {
                return Yii::$app->response->redirect(['admin/index']);
                //return $this->goBack(); //циклическое перенаправление на странице
                //return Yii::$app->response->redirect(['site/index']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Форма регистрации.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);
            if ($user = $model->signup()) {
                       // var_dump($user);
                return Yii::$app->response->redirect(['user/index']);
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Форма обновления.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);
            if ($user = $model->signup()) {
                       // var_dump($user);
                return Yii::$app->response->redirect(['user/index']);
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}