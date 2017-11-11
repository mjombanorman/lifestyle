<?php

namespace backend\modules\blog\controllers;

use yii\web\Controller;

/**
 * Default controller for the `blog` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $model = new \backend\modules\blog\models\Posts();
        return $this->render('index', ['model' => $model]);
    }

    public function actionTest() {
        return $this->render('test');
    }

}
