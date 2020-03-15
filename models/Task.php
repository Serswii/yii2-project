<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id_task
 * @property string $title
 * @property string $description
 * @property int $lvl
 * @property string $language
 * @property string $filetask
 * @property int $time
 * @property int $automat_ruch
 * @property int $id_organization
 * @property string $answer
 */
class Task extends \yii\db\ActiveRecord
{
    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'lvl', 'language', 'time', 'automat_ruch', 'id_organization'], 'required'],
            [['description', 'answer'], 'string'],
            [['image'], 'file'],
            [['image'], 'safe'],
            [['lvl', 'time', 'automat_ruch', 'id_organization'], 'integer'],
            [['title', 'language'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_task' => 'Id Задачи',
            'title' => 'Название',
            'description' => 'Описание',
            'lvl' => 'Уровень сложности',
            'language' => 'Язык программирования',
            'filetask' => 'Файл',
            'time' => 'Время в минутах',
            'automat_ruch' => 'Тип проверки',
            'id_organization' => 'Id Организации',
            'answer' => 'Ответ',
        ];
    }
    /**
     * fetch stored image file name with complete path
     * @return string
     */
    public function getImageFile()
    {
        return isset($this->filetask) ? $this->filetask : null;
    }
    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteImage() {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->filetask = null;

        return true;
    }
//    public function upload()
//    {
//        if ($this->validate()) {
//            $path = Yii::getAlias('@webroot/upload/store/');
//            $this->filetask->saveAs($path.$this->filetask->baseName.'.'.$this->filetask->extension);
////            $path = 'uploads/store/' . $this->photo->baseName . '.' . $this->photo->extension;
////            $this->photo->saveAs($path);
//            $this->filetask = '/uploads/store/' . $this->filetask->baseName . '.' . $this->filetask->extension;
////            $this->attachImage($path);
//            return true;
//        } else {
//            return false;
//        }
//    }

    public static function idUser($id){
        if(Yii::$app->user->identity->id == $id){
            return true;
        }

        return false;
    }
    public static function idOrg($id){
        $categorys = User::find()->where(['id_organization' => Yii::$app->user->identity->id])->one();
        $status = $categorys->id_organization;
        if($status == $id){
            return true;
        }
            return false;
    }

    public static function getOrg(){
        $categorys = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $status = $categorys->id_organization;
        return $status;
    }
    public static function getTaskCalllang($lang){
        $categorys = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $status = $categorys->id_organization;
        $task = Task::find()->where(['language' => $lang, 'id_organization' => $status, ])->count();
        return $task;
    }
    public static function TaskCalllvl1($lvl, $lang){
        $categorys = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $status = $categorys->id_organization;
        $task = Task::find()->where(['lvl' => $lvl, 'id_organization' => $status, 'language'=> $lang])->count();
        return $task;
    }

    public static function getTaskReader($lvl, $lang){
        $categorys = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $status = $categorys->id_organization;
        $task = Task::find()->where(['id_organization' => $status])->count();
        if ($task != 0){
            $post = Task::find()->where(['lvl' => $lvl, 'id_organization' => $status, 'language' => $lang])->orderBy('rand()')->one();
//            $taskpost = Task::find()->where(['id_organization' => $status])->all();
//                if($item->lvl != "" && $item->language !=""){
//                    $items[] = $item->id_task;
//                    for($i = 0; $i < Task::find()->max('id_task'); $i++){
//                        $id_taskreader = Task::find()->where(['id_task' => $items[$i]])->all();
//                    }
            return $post;
            }
        return false;
//            $taskid = $taskpost->id_task;
//            $taskpost = Task::find()->where(['id_task' => $taskid])->all();
        }
    public static function TaskAll() {
        $task_lvl = Task::find()->all();
        return $task_lvl;
    }
    public function getLanguages()
    {
        return $this->hasOne(Language::className(), ['id_language' => 'language']);
    }

    }
