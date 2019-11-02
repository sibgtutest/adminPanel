<?php
 
namespace app\controllers;
 
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\EntryForm;
 
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
    public function actionEntry()
    {
        $this->layout = 'test';

        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
}