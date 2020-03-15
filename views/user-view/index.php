<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\Task;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$query = User::find();
//$provider = new ActiveDataProvider([
//    'query' => $query,
//    'pagination' => [
//        'pageSize' => 10,
//    ],
//    'sort' => [
//        'defaultOrder' => [
//            'id' => SORT_DESC,
////            'username' => SORT_ASC,
//        ]
//    ],
//]);
$role = app\models\User::getrole();
//echo print_r(Yii::$app->user->identity);
$org_id = Task::getOrg();

//$count = $provider->getCount();
//if(Yii::$app->user->identity == null){
//  return Yii::$app->getResponse()->redirect('site/login');
//}
if ($role == 1){
    $title = 'Организации';
    $query = User::find()->where(['status' => 2]);
    $provider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ],
        'sort' => [
            'defaultOrder' => [
                'id' => SORT_DESC,
//            'username' => SORT_ASC,
            ]
        ],
    ]);
}
if ($role == 2){
    $title = 'Пользователи';
    $query_count = User::find()->where(['status' => 3, 'id_organization' => $org_id])->count();
    if($query_count > 0){
        $query = User::find()->where(['status' => 3, 'id_organization' => $org_id]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
//            'username' => SORT_ASC,
                ]
            ],
        ]);
    }
//    else {
//        return Yii::$app->getResponse()->redirect('/');
//    }


}
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-view-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if ($role == 1): ?>
        <p>
            <?= Html::a('Создание организаций', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
    <?php if ($role == 2): ?>
        <p>
            <?= Html::a('Создание пользователей', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $provider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            'email:email',
//            'password_hash',
//            'auth_key',
            //'confirmed_at',
            //'unconfirmed_email:email',
            //'blocked_at',
            //'registration_ip',
            //'created_at',
            //'updated_at',
            //'flags',
            //'last_login_at',
            //'status',
            //'id_organization',
            //'name_org',
            //'fio',
            //'access_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Вернуться', ['site/index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
