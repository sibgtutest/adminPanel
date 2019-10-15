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
use yii\web\UploadedFile;
use app\models\UploadCanvas;
use app\models\UploadPicture;
use app\models\Picture;
use app\models\Canvas;
use app\models\Teachingplan;
use app\models\UploadTeachingplan;

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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['stud'],
                'rules' => [
                    [
                        'actions' => ['stud'],
                        'allow' => false,
                        'roles' => ['roleRoot'],
                    ],
                    [
                        'actions' => ['stud'],
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
/*
    public function actionTeachingplan()
    {
        $this->layout = 'stud';
        $model = new UploadTeachingplan();
        $id= \Yii::$app->user->identity->id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save($id)) {
            return 12345;
        }
        $models = Teachingplan::findAll(['userid' => $id]);
        return $this->render('teachingplan', ['teachingplans' => $models, 'model' => $model]);
    }

    public function actionStudentarticles()
    {
        $this->layout = 'stud';
        return $this->render('studentarticles');
    }

    public function actionStudentsacademicwork()
    {
        $this->layout = 'stud';
        return $this->render('studentsacademicwork');
    }
    
    public function actionStudentsscientificachievements()
    {
        $this->layout = 'stud';
        return $this->render('studentsscientificachievements');
    }

    public function actionStudentssocialachievements()
    {
        $this->layout = 'stud';
        return $this->render('studentssocialachievements');
    }
 
    public function actionStudentssportingachievements()
    {
        $this->layout = 'stud';
        return $this->render('studentssportingachievements');
    }
*/   
    public function canvasfilename()
    {
        $id= \Yii::$app->user->identity->id;
        $canvas = Canvas::find()->where(['userid' => [$id]])->limit(1)->One();
        $canva = new Canvas();
        if (!isset($canvas)) {
            $canva->filename = "null.png";
            $canva->userid = $id;
            $canva->description = 'Not description';
           //$canva->save;
        } {
            $canva = $canvas;
        }
        /*if ($canvas->filename == '') {
            $canva = "null.png";
        } {
            $canva = $canvas->filename;
        }*/
        return $canva;
    }

    public function picturefilename()
    {
        $id= \Yii::$app->user->identity->id;
        $picture = Picture::find()->where(['userid' => [$id]])->limit(1)->One();
        if ($picture->filename == '') {
            $pictur = "null.png";
        } {
            $pictur = $picture->filename;
        }
        return $pictur;
    }

    /**
     * Displays Canvas.
     *
     * @return string
     */
    public function actionCanvas()
    {
        $this->layout = 'stud';
        $model = new UploadCanvas();
        $id= \Yii::$app->user->identity->id;
        if(Yii::$app->request->post()) {
          $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
              $path = Yii::$app->params['pathUploads'] . $id . '/';
              unlink( $path . $this->canvasfilename() );
              $model->file->saveAs( $path . $model->file);
              $model->save($id);
            }
        }
        $canva = $this->canvasfilename();
        //var_dump($pictures);
        return $this->render('canvas', ['model'=>$model, 'canvas'=>$canva]);
    } 

    /**
     * Displays picture.
     *
     * @return string
     */
    public function actionPicture()
    {
        $this->layout = 'stud';
        $model = new UploadPicture();
        $id= \Yii::$app->user->identity->id;
        if(Yii::$app->request->post()) {
          $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
              $path = Yii::$app->params['pathUploads'] . $id . '/';
              unlink( $path . $this->picturefilename() );
              $model->file->saveAs( $path . $model->file);
              $model->save($id);
            }
        }
        $picture = $this->picturefilename();
        //var_dump($pictures);
        return $this->render('picture', ['model'=>$model, 'picture'=>$picture]);
      } 

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'stud';
        if (!\Yii::$app->user->isGuest) {
            if (!\Yii::$app->user->can('roleRoot')) {
                //return Yii::$app->response->redirect(['site/stud']);
                return $this->render('index');
            } 
        } 
        return $this->render('index');
    }

    public function actionChat()
    {
        $this->layout = 'chat';
        //$contactdetails = Contactdetails::findOne(['userid' => '5']);
        return $this->render('chat');
    }

    /**
     * Displays homepage Stud.
     *
     * @return string
     */
    public function actionStud()
    {
        $id= \Yii::$app->user->identity->id;
        $canva = $this->canvasfilename();
        $this->layout = 'stud';
        if (!\Yii::$app->user->isGuest) {
            return $this->render('stud', ['canvas'=>$canva, 'id'=>$id]);
        } {
        return $this->render('index');
        }
    }

    public function actionTest()
    {
        return $this->render('test');
    }

    /**
     * Displays homepage Stud.
     *
     * @return string
     */
    public function actionContactdetails()
    {
        $this->layout = 'stud';
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
            'stud' => $model]);
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
                return Yii::$app->response->redirect(['site/index']);
            } {
                return $this->goBack(); //циклическое перенаправление на странице
                //return Yii::$app->response->redirect(['site/index']);
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
