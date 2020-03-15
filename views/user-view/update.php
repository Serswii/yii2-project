<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserView */
$role = app\models\User::getrole();
if ($role == 1){
    $title = 'Обновление Организации';
    $titles = 'Организации';
}
if ($role == 2){
    $title = 'Обновление пользователя';
    $titles = 'Пользователи';
}
$this->title = $title.' '.$model->username;
$this->params['breadcrumbs'][] = ['label' => $titles, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="user-view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
