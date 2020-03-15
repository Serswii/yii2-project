<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserView */
/* @var $form yii\widgets\ActiveForm */
$role = app\models\User::getrole();
$roleAdmin = app\models\User::getroleAdmin();
?>

<div class="user-view-form">

    <?php $form = ActiveForm::begin();
//    $items = ArrayHelper::map(app\models\UserView::find()->andWhere('name_org!=""')->all(),'id_organization','name_org');
    $org_id = app\models\Task::getOrg();
    ?>


    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'confirmed_at')->textInput() ?>

    <?//= $form->field($model, 'unconfirmed_email')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'blocked_at')->textInput() ?>

    <?//= $form->field($model, 'registration_ip')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'flags')->textInput() ?>

    <?//= $form->field($model, 'last_login_at')->textInput() ?>

    <?php if($role == 2): ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => 3])->label(false) ?>
    <?php endif; ?>
    <?php if($role == 1 && $roleAdmin != "admin"): ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => 2])->label(false) ?>
    <?php endif; ?>
    <?php if($role == 1 && $roleAdmin == "admin"): ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => 1])->label(false) ?>
    <?php endif; ?>


    <?php $max_org = \app\models\UserView::find()->max('id_organization');
    $neworg = $max_org + 1;
    ?>
    <?php if($role == 1): ?>
        <?= $form->field($model, 'id_organization')->hiddenInput(['value' => $neworg])->label(false) ?>
    <?php endif; ?>
    <?php if($role == 2): ?>
        <?= $form->field($model, 'id_organization')->hiddenInput(['value' => $org_id])->label(false) ?>
    <?php endif; ?>

    <?php if($role == 1): ?>
        <?= $form->field($model, 'name_org')->textInput(['maxlength' => true]) ?>
    <?php endif; ?>
    <?php if($role == 2): ?>
        <?= $form->field($model, 'fio')->textInput() ?>
    <?php endif; ?>
    <!--    --><?//= $form->field($model, 'access_token')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
