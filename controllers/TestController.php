<?php
 
namespace app\controllers;
 
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadForm;
 
class TestController extends Controller
{
  //public $layout = 'photo';
  public function actionIndex()
  {
    $model = new UploadForm();
    $id = \Yii::$app->user->identity->id;
    if($model->load(Yii::$app->request->post())) {
      $model->file = UploadedFile::getInstance($model, 'file');
        if ($model->validate()) {
          $path = Yii::$app->params['pathUploads'] . $id . '/';
          $model->file->saveAs( $path . $model->file);
        }
    }
    return $this->render('index', ['model'=>$model]);
  } 
}