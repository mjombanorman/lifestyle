<?php

namespace backend\modules\blog\controllers;

use Yii;
use backend\modules\blog\models\Posts;
use backend\modules\blog\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller {

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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'post_img');
            if (!empty($uploaded_image)) {
                $image_name = 'images/blog_content/' . Yii::$app->security->generateRandomString(10) . '.' . $uploaded_image->extension;
                $model->post_img = $image_name;
            }
            $model->post_author_id = Yii::$app->user->identity->id;
            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
                Yii::$app->session->setFlash('success', 'Post created successfully');
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->post_id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old_image = $model->post_img;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'post_img');
            if (!empty($uploaded_image)) {
                $image_name = 'images/blog_content/' . Yii::$app->security->generateRandomString(10) . '.' . $uploaded_image->extension;
                $model->post_img = $image_name;
            } else {
                $model->post_img = $old_image;
            }

            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    @unlink($old_image);
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Posts updated successfully');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->post_img) {
            @unlink($model->post_img);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
