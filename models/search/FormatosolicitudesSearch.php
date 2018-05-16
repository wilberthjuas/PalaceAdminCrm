<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formatosolicitudes;

/**
 * FormatosolicitudesSearch represents the model behind the search form of `app\models\Formatosolicitudes`.
 */
class FormatosolicitudesSearch extends Formatosolicitudes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'users_id'], 'integer'],
            [['autorizador_id', 'autorizador_nombre', 'autorizador_puesto', 'solicitante_id', 'solicitante_nombre', 'solicitante_puesto', 'usuario_id', 'nombre', 'puesto', 'departamento', 'correo', 'comentario'], 'safe'],
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
        $query = Formatosolicitudes::find();

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
            'users_id' => $this->users_id,
        ]);

        $query->andFilterWhere(['like', 'autorizador_id', $this->autorizador_id])
            ->andFilterWhere(['like', 'autorizador_nombre', $this->autorizador_nombre])
            ->andFilterWhere(['like', 'autorizador_puesto', $this->autorizador_puesto])
            ->andFilterWhere(['like', 'solicitante_id', $this->solicitante_id])
            ->andFilterWhere(['like', 'solicitante_nombre', $this->solicitante_nombre])
            ->andFilterWhere(['like', 'solicitante_puesto', $this->solicitante_puesto])
            ->andFilterWhere(['like', 'usuario_id', $this->usuario_id])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'departamento', $this->departamento])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
