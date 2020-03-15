<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserSetting */

$this->title = 'Обновить профиль: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => "Просмотр профиля", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление профиля';
?>
<div class="user-setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
