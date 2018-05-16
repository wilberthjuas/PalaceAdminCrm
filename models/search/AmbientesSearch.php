<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ambientes;

/**
 * AmbientesSearch represents the model behind the search form of `app\models\Ambientes`.
 */
class AmbientesSearch extends Ambientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entornos_id'], 'integer'],
            [['ambiente'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Ambientes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'entornos_id' => $this->entornos_id,
        ]);

        $query->andFilterWhere(['like', 'ambiente', $this->ambiente]);

        return $dataProvider;
    }
}
