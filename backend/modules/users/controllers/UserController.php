<?php

namespace backend\modules\users\controllers;

use Yii;
use backend\modules\users\models\User;
use backend\modules\users\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\users\models\ProfileImages;
use backend\modules\users\models\UserProfile;
use frontend\models\SignupForm;
use yii\web\UploadedFile;
use backend\modules\users\models\UsersView;
use backend\modules\users\models\UsersViewSearch;
use backend\modules\users\components\UsersModuleConstants;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
        $this->MENU = UsersModuleConstants::MENU_USERS;
        parent::init();
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsersViewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionTest() {
        return $this->render('test');
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SignupForm;
        $profile = new UserProfile();
        $img_model = new ProfileImages();

        if ($model->load(Yii::$app->request->post()) && $img_model->load(Yii::$app->request->post())) {
            $uploaded_img = UploadedFile::getInstance($img_model, 'profile_img');
            $model->username = $model->email;
            $profile->first_name = $model->first_name;
            $profile->last_name = $model->last_name;
            if ($model->validate()) {
                if ($user = $model->signup()) {
                    $profile->user_id = $user->id;
                    $img_model->user_id = $user->id;
                    if (!empty($uploaded_img)) {
                        $img_model->image = $this->getDir($user->id) . '/' . Yii::$app->security->generateRandomString() . '.' . $uploaded_img->extension;
                        $img_model->is_profile_image = 1;
                        $uploaded_img->saveAs($img_model->image);
                    }
                    $img_model->save(false);
                    $profile->save(false);
                    return $this->redirect(['index']);
                }
            } else {
                var_dump($model->errors);
                die();
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'profile' => $profile,
                    'img_model' => $img_model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getDir($user_id) {
        return $this::createDir($this->getBaseDir() . '/user_images/' . $user_id);
    }

    public function getBaseDir() {
        //  return $this::createDir(Yii::getAlias('@web'));
        return 'images';
    }

    public static function createDir($dir_name, $permission = 0755) {
        //check if the directory already exists
        if (!is_dir($dir_name)) {
            //create the user's root dir
            mkdir($dir_name, $permission);
        }
        return $dir_name;
    }

}
