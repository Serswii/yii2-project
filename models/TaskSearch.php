<?php

namespace app\models;

use app\models\Task;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    public $languageName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_task', 'lvl', 'time', 'automat_ruch', 'id_organization'], 'integer'],
            [['title', 'description', 'language', 'filetask', 'answer', 'languageName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Task::find();
        $query->joinWith(['languages']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['languageName'] = [
            'asc' => [Language::tableName().'.languagename' => SORT_ASC],
            'desc' => [Language::tableName().'.languagename' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id_task,
            'lvl' => $this->lvl,
            'time' => $this->time,
            'automat_ruch' => $this->automat_ruch,
            'id_organization' => $this->id_organization,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'answer', $this->answer])
        ->andFilterWhere(['like', Language::tableName().'.languagename', $this->languageName]);

        return $dataProvider;
    }
}
