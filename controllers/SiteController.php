<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Contactdetails;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\StudForm;

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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['roleRoot'],
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
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/stud']);
        } {
            return $this->render('index');
        }
    }

    /**
     * Displays homepage Stud.
     *
     * @return string
     */
    public function actionStud()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('stud');
        } {
        return $this->render('index');
        }
    }

    /**
     * Displays homepage Stud.
     *
     * @return string
     */
    public function actionContactdetails()
    {
        $model = new StudForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        $id = \Yii::$app->user->identity->id;
        $user = User::findOne($id);
        $model->username = $user->username;
        $model->email = $user->email;
        if (!($contactdetails = Contactdetails::findOne(['userid' => $id]))) {
            $contactdetails = new Contactdetails();
        }
        $model->studname = $contactdetails->studname;
        $model->middlename = $contactdetails->middlename;
        $model->familyname = $contactdetails->familyname;
        $model->birthdate = $contactdetails->birthdate;
        $model->yearset = $contactdetails->yearset;
        $model->formeducation = $contactdetails->formeducation;
        $model->lineeducation = $contactdetails->lineeducation;
        $model->status = $contactdetails->status;
        return $this->render('contactdetails', [
            'stud' => $model,
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
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (\Yii::$app->user->can('roleStud')) {
                //return '123';
                return Yii::$app->response->redirect(['site/stud']);
            } {
                return $this->goBack();
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * admin is created once. Don't delete it.
     */
    /*public function actionAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'farid.lfsibgtu.ru@mail.ru';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }*/

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
