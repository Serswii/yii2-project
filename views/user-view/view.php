<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserView */
$role = app\models\User::getrole();
if ($role == 1){
    $title = 'Организации';
}
if ($role == 2){
    $title = 'Пользователи';
}
$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'password_hash',
//            'auth_key',
//            'confirmed_at',
//            'unconfirmed_email:email',
//            'blocked_at',
//            'registration_ip',
//            'created_at',
//            'updated_at',
//            'flags',
//            'last_login_at',
//            'status',
//            'id_organization',
            'name_org',
            'fio',
//            'access_token',
        ],
    ]) ?>
    <p>
        <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
