<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{

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
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $ext = $image->baseName . '.' . $image->extension;

            // generate a unique file name
            $model->filetask = 'uploads/'.$ext;

            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = $model->filetask;

            if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id_task]);
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->getImageFile();
        $oldAvatar = $model->filetask;
        if ($model->load(Yii::$app->request->post())) {
            unlink(Yii::getAlias('@webroot') . '/' . $oldAvatar);
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $ext = Yii::$app->security->generateRandomString(10).$image->baseName . '.' . $image->extension;

            // generate a unique file name
            $model->filetask = 'uploads/'.Yii::$app->security->generateRandomString(10).$ext;
            // if no image was uploaded abort the upload
            if (empty($image)) {
                return false;
            }

            // revert back if no valid file instance uploaded
            if ($image === false) {

                $model->filetask = $oldAvatar;
            }


            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)

            if ($model->save()) {
                if ($image !== false) { // delete old and overwrite

                    $path = $model->filetask;
                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id_task]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::$app->basePath . '/web/' . $model->filetask);
        if ($model->delete()) {
            if (!$model->deleteImage()) {
                Yii::$app->session->setFlash('error', 'Error deleting image');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
