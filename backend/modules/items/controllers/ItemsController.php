<?php

namespace backend\modules\items\controllers;

use Yii;
use backend\modules\items\models\Items;
use backend\modules\items\models\ItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\modules\items\models\ItemSubCategory;
use yii\web\Response;

/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller {

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
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Items();
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'prod_img');
            if (!empty($uploaded_image)) {
                $image_name = 'images/item_images/' . Yii::$app->security->generateRandomString(10) . '.' . $uploaded_image->extension;
                $model->prod_img = $image_name;
            }
            $model->created_by = Yii::$app->user->identity->id;
            $model->status = 1;

            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Item added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old_image = $model->itm_image;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'itm_image');
            if (!empty($uploaded_image)) {
                $image_name = 'item_images/' . $model->name . '.' . $uploaded_image->extension;
                $model->logo = $image_name;
            }
            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    @unlink($old_image);
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Item added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->itm_image) {
            @unlink($model->itm_image);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionSelectcat($cat_id) {

        $model = ItemSubCategory::find()->where(['itp_id' => $cat_id])->all();
        $allItems;
        if ($model) {
            foreach ($model as $item) {
                $allItems[$item->itp_id] = $item->itp_name;
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $allItems;
        }
        return null;
    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
