<?php

namespace backend\modules\items\controllers;

use Yii;
use backend\modules\items\models\ItemManu;
use backend\modules\items\models\ItemManuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ManuController implements the CRUD actions for ItemManu model.
 */
class ManuController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all ItemManu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ItemManuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemManu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItemManu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ItemManu();
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'logo');
            if (!empty($uploaded_image)) {
                $image_name = 'manu/logos/' . $model->name . '.' . $uploaded_image->extension;
                $model->logo = $image_name;
            }
            $model->created_by = Yii::$app->user->identity->id;
            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Make added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing ItemManu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old_image = $model->logo;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'logo');
            if (!empty($uploaded_image)) {
                $image_name = 'manu/logos/' . $model->name . '.' . $uploaded_image->extension;
                $model->logo = $image_name;
            }
            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    @unlink($old_image);
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Make added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing ItemManu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItemManu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemManu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ItemManu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
