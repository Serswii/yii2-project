<?php

/* @var $this yii\web\View */
use app\controllers\SiteController;
use app\models\Task;
use app\models\Language;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$session->open();
$this->title = 'Главная';
$lang_watch = Language::language();
$view = Task::TaskAll();


$count = 1;
// первый вариант
//
//$reader4lang1= $_POST['item4lang1'];
//switch (\Yii::$app->request->post('submit')) {
//    case 'submit_1':
//        $id = 4;
//        $session->set('id', $id);
//        break;
//    case 'submit_2':
//        $id = 2;
//        $session->set('id', $id);
//}
    if (isset($_GET['button4'])):
        $task_reader = Task::getTaskReader(4, 2);
        ?>
        <pre>
<?php
        var_dump($task_reader);
        echo $task_reader->title;
    ?>
        </pre>
<?php endif;
?>
<?//=$item4lang1["$item4lang1"];?>
<!--//print_r($item[0]);-->



<div class="site-index">
<!--    <pre>-->
<!--   --><?php //var_dump($task_reader); ?>
<!--    </pre>-->
    <div class="start-button">
    <?php foreach ($lang_watch as $lang_item) {
        if (Task::getTaskCalllang($lang_item->id_language) == 0) {
            $disabled = "disabled";
            echo '<button class="btn btn-secondary button-menu" data-toggle="modal" data-target="#exampleModalCenter '.$lang_item->id_language.'" ' . $disabled . '>' . $lang_item->languagename.'</button>';
        }
        else {
            echo '<button class="btn btn-secondary button-menu" data-toggle="modal" data-target="#exampleModalCenter'.$lang_item->id_language.'">' . $lang_item->languagename.'</button>';
        }

    } ?>
    </div>
</div>

                        <?php foreach ($lang_watch as $lang_items) {
                            echo ' <div class="modal fade" id="exampleModalCenter'.$lang_items->id_language.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Выберите уровень сложности:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form1" method="get" action="">
                    <div>';
                                if (Task::TaskCalllvl1(1, $lang_items->id_language) == 0) {
                                    $disabled_lvl_lang = "disabled";
                                    echo '<button id="but1" class="btn btn-secondary"' . $disabled_lvl_lang .'>1</button>';
                                }
                                else {
                                    echo '<button id="but1" type="submit" name="button1" class="btn btn-secondary">1</button>';
                                }
                            if (Task::TaskCalllvl1(2, $lang_items->id_language) == 0) {
                                $disabled_lvl_lang = "disabled";
                                echo '<button id="but2" class="btn btn-secondary"'. $disabled_lvl_lang.'>2</button>';
                            }
                            else {
                                echo '<button id="but2" type="submit" name="button2" class="btn btn-secondary">2</button>';
                            }
                            if (Task::TaskCalllvl1(3, $lang_items->id_language) == 0) {
                                $disabled_lvl_lang = "disabled";
                                echo '<button id="but3" class="btn btn-secondary" ' . $disabled_lvl_lang .'>3</button>';
                            }
                            else {
                                echo '<button id="but3" type="submit" name="button3" class="btn btn-secondary">3</button>';
                            }
                            if (Task::TaskCalllvl1(4, $lang_items->id_language) == 0) {
                                $disabled_lvl_lang = "disabled";
                                echo '<button id="but4" type="submit" name="button4disabled" class="btn btn-secondary" ' . $disabled_lvl_lang .'>4</button>';
                            }
                            else {
                                echo '<button type="submit" name="button4" id="but4" class="btn btn-secondary">4</button>';
                            }
                            if (Task::TaskCalllvl1(5, $lang_items->id_language) == 0) {
                                $disabled_lvl_lang = "disabled";
                                echo '<button id="but5" class="btn btn-secondary" ' . $disabled_lvl_lang .'>5</button>';
                            }
                            else {
                                echo '<button id="but5" type="submit" name="button5" class="btn btn-secondary">5</button>';
                            }
                            echo '</div>
                    </form>
                </div>

            </div>
        </div>
    </div>';
                        }
                            ?>



