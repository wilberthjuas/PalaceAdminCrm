<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sistemasap;

/**
 * SistemasapSearch represents the model behind the search form of `app\models\Sistemasap`.
 */
class SistemasapSearch extends Sistemasap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'solicitudAlta_id'], 'integer'],
            [['sistemas', 'ambientes', 'portales'], 'safe'],
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
        $query = Sistemasap::find();

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
            'solicitudAlta_id' => $this->solicitudAlta_id,
        ]);

        $query->andFilterWhere(['like', 'sistemas', $this->sistemas])
            ->andFilterWhere(['like', 'ambientes', $this->ambientes])
            ->andFilterWhere(['like', 'portales', $this->portales]);

        return $dataProvider;
    }
}
