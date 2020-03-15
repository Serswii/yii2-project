<?php

use app\models\Task;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserSetting */

$this->title = "Настройки";
$this->params['breadcrumbs'][] = "Просмотр профиля";
\yii\web\YiiAsset::register($this);
//$id = Yii::$app->user->identity->id;

?>
<div class="user-setting-view">

    <h1><?= Html::encode($model->username) ?></h1>

    <p><?php if(Task::idUser($model->id)){
        $id = Yii::$app->user->identity->id;
            Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        else {
            Yii::$app->getResponse()->redirect('/user-setting/view?id='. Yii::$app->user->identity->id);
        } ?>
<!--        --><?//= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
//            'email:email',
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
//            'name_org',
//            'fio',
//            'access_token',
        ],
    ]) ?>
    <p>
        <?= Html::a('Вернуться', ['site/index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
