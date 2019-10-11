<?php

namespace app\controllers;

use Yii;
use app\models\Teachingplan;
use app\models\Teachingplancreate;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeachingplanController implements the CRUD actions for Teachingplan model.
 */
class TeachingplanController extends Controller
{
    public $layout = 'teachingplan';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Teachingplan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Teachingplan::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teachingplan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /*return $this->render('view', [
            'model' => $this->findModel($id),
        ]);*/

        
        $dataProvider = Teachingplan::find()->where(['id' => $id])->limit(1)->one();
        $filename = $dataProvider->filename;
        $id= \Yii::$app->user->identity->id;   
        return $this->redirect('/img/' . $id . '/' . $filename);
        /*//return $dataProvider->filename;
        $i = \Yii::$app->user->identity->id;
        $path = Yii::$app->params['pathUploads'] . $i . '/';
        //return $path;
        return \Yii::$app->response->sendContentAsFile($path, $filename, ['inline'=>true]);*/
    }

    /**
     * Creates a new Teachingplan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teachingplancreate();
        $id= \Yii::$app->user->identity->id;
        if(Yii::$app->request->post()) {
          $model->filename = UploadedFile::getInstance($model, 'filename');
            if ($model->validate()) {
              $path = Yii::$app->params['pathUploads'] . $id . '/';
              //unlink( $path . $this->canvasfilename() );
              $model->filename->saveAs( $path . $model->filename);
              $model->save($model->filename);
              //return $this->goBack();
              return $this->redirect(['teachingplan/index']);
            }
        }

        /*$model = new Teachingplan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Teachingplan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Teachingplan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teachingplan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teachingplan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teachingplan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
