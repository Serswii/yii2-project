<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$id_user = Yii::$app->user->identity->id;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if(\app\models\Task::idOrg($model->id_task)){
        Html::a('Обновить',['update', 'id' => $model->id_task],['class' => 'btn btn-primary']);
             Html::a('Удалить', ['delete', 'id' => $model->id_task], [
                 'class' => 'btn btn-danger',
                 'data' => [
                     'confirm' => 'Are you sure you want to delete this item?',
                     'method' => 'post',
                 ],
             ]);
        }
        else {
            Yii::$app->getResponse()->redirect('/task/index');
        }
?>

<!--        --><?//= Html::a('Обновить',['update', 'id' => $model->id_task],['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Удалить', ['delete', 'id' => $model->id_task], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>
<?php $img = $model->filetask; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_task',
            'title',
            'description:ntext',
            'lvl',
            'language',
//            [
//               'attribute' => 'filetask',
//               'value' => $img,
////                'value' =>function() {
////                    return;
////                }
//
//            ],
        'filetask',
            'time',
            'automat_ruch',
            'id_organization',
            'answer:ntext'
        ],
    ]) ?>
    <p>
        <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
