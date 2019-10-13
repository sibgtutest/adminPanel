<?php

namespace app\controllers;

use Yii;
use app\models\Studentsacademicwork;
use app\models\Studentsacademicworkcreate;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsacademicworkController implements the CRUD actions for Studentsacademicwork model.
 */
class StudentsacademicworkController extends Controller
{
    public $layout = 'studentsacademicwork';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Studentsacademicwork models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userid= \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => Studentsacademicwork::find()->where(['userid' => $userid]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Studentsacademicwork model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dataProvider = Studentsacademicwork::find()->where(['id' => $id])->limit(1)->one();
        $filename = $dataProvider->filename;
        $i = \Yii::$app->user->identity->id;
        $file = \Yii::$app->params['pathUploads'] . $i . '/' . 'studentsacademicwork_' . $filename;
        header('Content-Description: File Transfer');
        //header('Content-Type: application/octet-stream');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

    /**
     * Creates a new Studentsacademicwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Studentsacademicworkcreate();
        $userid= \Yii::$app->user->identity->id;
        if(Yii::$app->request->post()) {
          $model->filename = UploadedFile::getInstance($model, 'filename');
            if ($model->validate()) {
              $path = Yii::$app->params['pathUploads'] . $userid . '/';
              //unlink( $path . $this->canvasfilename() );
              $model->filename->saveAs( $path . 'studentsacademicwork_' . $model->filename);
              $model->save($model->filename);
              //return $this->goBack();
              return $this->redirect(['studentsacademicwork/index']);
            }
        }

        /*$model = new Studentsacademicwork();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Studentsacademicwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userid= \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => Studentsacademicwork::find()->where(['userid' => $userid]),
        ]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Studentsacademicwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $userid= \Yii::$app->user->identity->id;
        $path = \Yii::$app->params['pathUploads'] . $userid . '/';
        unlink( $path . 'studentsacademicwork_' . $this->findModel($id)->filename );
        //unlink( '/home/farid/NetBeansProjects/adminPanel/test/5/public.pdf' );
        //return $path . $this->findModel($id)->filename;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSave($id)
    {
        \Yii::$app->db->createCommand()
             ->update('studentsacademicwork', ['status' => 1], ['id' => $id])
             ->execute();
        return $this->redirect(['index']);
    }    

    /**
     * Finds the Studentsacademicwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Studentsacademicwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Studentsacademicwork::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}