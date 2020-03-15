<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\widgets\LinkPager;

// первый вариант
$session = Yii::$app->session;
$session->open();
$reader4lang1= $_POST['item4lang1'];
//if(!isset($reader4lang1)){
    $id_task = $session->get('id_task');
//}
$id = $session->get('id');

$id_task2 = $session->get('id_task2');
$this->title = 'Задача';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?=Yii::$app->urlManager->createUrl(['site/index', 'item4lang1' => $id_task ])?>"><?=$id_task ?><?=$id ?></a>

   <p>ffff</p>


</div>