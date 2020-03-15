<?php

use app\models\Language;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    $items = ArrayHelper::map(Language::find()->all(),'id_language','languagename');
    $org_id = app\models\Task::getOrg();
    $lvl = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
    ]
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lvl')->dropDownList($lvl) ?>

    <?= $form->field($model, 'language')->dropDownList($items) ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],])->label("Файл"); ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'automat_ruch')->radioList(['1' => 'Автоматическая', 2 => 'Ручная',], ['labelOptions'=> ['style'=>'display:block'], 'separator'=>'&nbsp;&nbsp;&nbsp;</br>',]); ?>

    <?= $form->field($model, 'id_organization')->hiddenInput(['value' => $org_id])->label(false) ?>



    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
