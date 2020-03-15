<?php

use app\models\Language;
use app\models\Task;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
$org_id = Task::getOrg();
$query = Task::find()->where(['id_organization' => $org_id]);
$i = 0;
$provider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'defaultOrder' => [
//            'id_task' => SORT_DESC,
//            'username' => SORT_ASC,
        ]
    ],
]);
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php  ?>
    <?= GridView::widget([
        'dataProvider' => $provider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_task',
            'title',
//            'description:ntext',
            'lvl',
            [
                    'attribute' => 'languageName',
                    'value' => 'languages.languagename'
            ],
            //'filetask',
            //'time',
            //'automat_ruch',
            //'id_organization',
//            'answer:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

