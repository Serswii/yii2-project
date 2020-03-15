<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id_language
 * @property string $language
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language'], 'required'],
            [['language'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_language' => 'Id Language',
            'language' => 'Language',
        ];
    }

    public static function language() {
        $language_name = Language::find()->all();
        return $language_name;
    }
    public function getTask() {
        return $this->hasMany(Task::className(), ['language' => 'id_language']);
    }

}
