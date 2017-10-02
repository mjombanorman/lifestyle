<?php

namespace backend\modules\products\controllers;

use Yii;
use backend\modules\products\models\Products;
use backend\modules\products\models\ProductsSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                        [
                        'actions' => [],
                        'allow' => true,
                    ],
                        [
                        'actions' => ['create', 'delete', 'view', 'update', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTest() {
        return $this->render('test');
    }

    public function actionUploadblogimg() {

        /*         * *****************************************************
         * Only these origins will be allowed to upload images *
         * **************************************************** */
        $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://healthylifestyle.co.ke");

        /*         * *******************************************
         * Change this line to set the upload folder *
         * ******************************************* */
        $imageFolder = Yii::getALias('@web') . '/images/blog_content/';
        var_dump($imageFolder);



        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            if (isset($_SERVER['HTTP_ORIGIN'])) {
                // same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                } else {
                    header("HTTP/1.0 403 Origin Denied");
                    return;
                }
            }
            var_dump($temp['tmp_name']);
            die('made it');

            /*
              If your script needs to receive cookies, set images_upload_credentials : true in
              the configuration and enable the following two headers.
             */
            // header('Access-Control-Allow-Credentials: true');
            // header('P3P: CP="There is no P3P policy."');
            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.0 500 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.0 500 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            move_uploaded_file($temp['tmp_name'], $filetowrite);

            // Respond to the successful upload with JSON.
            // Use a location key to specify the path to the saved image resource.
            // { location : '/your/uploaded/image/file'}
            echo json_encode(array('location' => $filetowrite));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.0 500 Server Error");
        }
    }

    public function actionCreate() {
        $model = new Products();
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
            Yii::$app->session->setFlash('success', 'Product added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old_image = $model->prod_img;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $uploaded_image = UploadedFile::getInstance($model, 'prod_img');
            if (!empty($uploaded_image)) {
                $image_name = 'images/item_images/' . Yii::$app->security->generateRandomString(10) . '.' . $uploaded_image->extension;
                $model->prod_img = $image_name;
            } else {
                $model->prod_img = $old_image;
            }

            if ($model->save(false)) {
                if (!empty($uploaded_image)) {
                    @unlink($old_image);
                    if ($uploaded_image->saveAs($image_name)) {

                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Product added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->prod_img) {
            @unlink($model->prod_img);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
