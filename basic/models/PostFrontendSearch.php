<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class PostFrontendSearch extends Post
{
    public function rules()
    {
        return [
           [['text'],'string','max'=>50],
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
        $query = Post::find();

     

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
           
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
        ]);

        $query->orFilterWhere(['like', 'title', $this->title])
            ->orFilterWhere(['like', 'lead', $this->lead])
            ->orFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
