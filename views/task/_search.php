<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_task') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'lvl') ?>

    <?= $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'filetask') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'automat_ruch') ?>

    <?php // echo $form->field($model, 'id_organization') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
