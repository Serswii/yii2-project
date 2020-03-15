<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
 <?php

        $role = app\models\User::getrole(); //получаем роль пользователя
        $id_user = Yii::$app->user->identity->id;
        echo print_r($role);
        NavBar::begin([
            'brandLabel' => 'My Company',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Организации', 'url' => ['/user-view/index'], 'visible' => !Yii::$app->user->isGuest && $role == 1],
                ['label' => 'Пользователи', 'url' => ['/user-view/index'], 'visible' => !Yii::$app->user->isGuest && $role == 2],
                ['label' => 'Задачи', 'url' => ['/task/index'], 'visible' => !Yii::$app->user->isGuest && $role == 2],
//                Html::a('Text',
//                    ['/user-setting/view', 'id' => $id_user], [
//                        'data-method' => 'POST',
////                        'data-params' => [
////                            'csrf_param' => \Yii::$app->request->csrfParam,
////                            'csrf_token' => \Yii::$app->request->csrfToken,
////                        ],
//                    ])
                ['label' => 'Настройки', 'url' => ['/user-setting/view?id='. Yii::$app->user->identity->id], 'visible' => !Yii::$app->user->isGuest && $role == 3],
                ['label' => 'Настройки', 'url' => ['/user-setting/view?id='. Yii::$app->user->identity->id], 'visible' => !Yii::$app->user->isGuest && $role == 2],
                Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>
<!--    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span></button><a class="navbar-brand" href="/">My Company</a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav"><li><a href="/user-view/index">Организации</a></li>-->
<!--                    <li><a href="/user-view/index">Пользователи</a></li>-->
<!--                    <li><a href="/task/index">Задачи</a></li>-->
<!--                    <li><form action="/site/logout" method="post">-->
<!--                            <input type="hidden" name="--><?//=Yii::$app->request->csrfParam; ?><!--" value="--><?//=Yii::$app->request->getCsrfToken(); ?><!--"><button type="submit" class="btn btn-link logout">Выход</button></form></li></ul></div></div></nav>-->


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
