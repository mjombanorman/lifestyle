<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Session;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Orders;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use backend\modules\products\models\Category;
use backend\modules\products\models\Products;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                        [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                        [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                        [
                        'actions' => ['logmeout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'home';
        $categories = Category::find()->all();
        $products = Products::find()->limit(8)->all();
        $blog = \backend\modules\blog\models\Posts::find()->where([])->orderby(['post_id' => SORT_DESC])->all();
        return $this->render('index', ['products' => $products, 'blog' => $blog]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionShop($cat = null, $sort = null) {
        $query = Products::find()->where([]);
        $allCategories = Category::find()->all();

        if ($cat) {
            $query = Products::find()->where(['category_id' => $cat]);
        } else if ($sort) {
            $query = Products::find()->where([]);
        }

        $count = $query->count();
        $pagination = new pagination(['totalCount' => $count]);
        $pagination->pageSize = 9;
        $model = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        //var_dump($pagination);
        // die();
        return $this->render('shop', [
                    'model' => $model,
                    'allCategories' => $allCategories,
                    'pagination' => $pagination,
        ]);
    }

    public function actionView($id) {
        $allCategories = Category::find()->all();
        $model = Products::find()->where(['id' => $id])->one();
        $related = Products::find()->where(['not in', 'id', [$model->id], 'category_id' => $model->category_id])->all();

        return $this->render('view', ['allCategories' => $allCategories, 'model' => $model, 'related' => $related]);
    }

    //Add to cart
    public function actionCart($id, $quantity = null) {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $item = Products::find()->where(['id' => $id])->one();

        if ($item) {
            $_SESSION['cart'][$id] = $item;
            return true;
        } else {
            return false;
        }
        // return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionFloatingcart() {
        $list = [];
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($session->has('cart')) {
            foreach ($_SESSION['cart'] as $result) {
                $list[] = $result;
            }
        }
        // Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('floating_cart', ['list' => $list]);
    }

    public function actionTest() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($session->destroy()) {
            return true;
        }
        return false;
    }

    //Remove from cart
    public function actionUncart($id) {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        unset($_SESSION['cart'][$id]);
        unset($_SESSION['quantity'][$id]);
        return true;
    }

    //Render All Cart Details
    public function actionViewcart() {

        return $this->render('view_cart');
    }

    //Render Cart Table
    public function actionTablecart() {
        $list = [];
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($session->has('cart')) {

            foreach ($_SESSION['cart'] as $result) {
                $list[] = $result;
            }
        }
        // Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('table_cart', ['list' => $list]);
    }

    public function actionQuantity($quantity, $id) {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($quantity == 0) {
            $quantity = 1;
        }
        $_SESSION['quantity'][$id] = floor($quantity);
        return true;
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSuccess($status) {
        if ($status == 111) {
            return $this->render('success', ['status' => $status]);
        }
    }

    public function actionBlog() {
        $query = \backend\modules\blog\models\Posts::find()->where([]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->pageSize = 10;
        $model = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        $category_all = \backend\modules\blog\models\Category::find()->where([])->all();
        return $this->render('blog/blog', [
                    'model' => $model,
                    'category_all' => $category_all,
                    'pagination' => $pagination,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogmeout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            $mail = Yii::$app->mailer->compose();
            $mail->setTo($model->email)
                    ->setFrom([$model->email => $model->name])
                    ->setSubject($model->subject)
                    ->setTextBody($model->body)
                    ->send();
            $model->status = true;
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            } else {

            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
