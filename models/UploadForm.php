<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'task';
    }
    /**
     * @var UploadedFile
     */
    public $file;
    public $title;
    public $description;
    public $lvl;
    public $language;
    public $automat_ruch;
    public $time;
    public $id_organization;

    public function rules()
    {
        return [
            [['title', 'description', 'lvl', 'language', 'time', 'automat_ruch', 'id_organization'], 'required'],
            [['description'], 'string'],
            [['file'], 'file', 'skipOnEmpty' => false],
            [['lvl', 'time', 'automat_ruch', 'id_organization'], 'integer'],
            [['title', 'language', 'filetask'], 'string', 'max' => 255],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
//            $dir = Yii::getAlias('uploads/');
            $this->file->saveAs('uploads/'.$this->file->baseName.'.'.$this->file->extension);
            return true;
        } else {
            return false;
        }
    }
}