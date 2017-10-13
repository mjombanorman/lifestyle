<?php

namespace backend\modules\blog\controllers;

use Yii;
use backend\modules\blog\models\Category;
use backend\modules\blog\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\blog\components\BlogModuleConstants;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller {

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

    public function init() {
        $this->MENU = BlogModuleConstants::MENU_BLOG;
        $this->SUB_MENU = BlogModuleConstants::SUB_MENU_CATEGORY;
        parent::init();
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex() {
        $model = new Category();
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Category();
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->created_by = Yii::$app->user->identity->id;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Category added successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Category updated successfully');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
