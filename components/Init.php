<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\LoginForm;

class Init extends Component {

    public function init() {
        if (Yii::$app->getUser()->isGuest && Yii::$app->getRequest()->url !== Url::to(['/site/login'])
        ) {
            Yii::$app->getResponse()->redirect('site/login');
        }

        parent::init();
    }

}