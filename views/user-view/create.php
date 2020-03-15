<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserView */
$role = app\models\User::getrole();
if ($role == 1){
    $title = 'Создание Организаций';
    $titles = 'Организации';
}
if ($role == 2){
    $title = 'Создание пользователей';
    $titles = 'Пользователи';
}
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => $titles, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
