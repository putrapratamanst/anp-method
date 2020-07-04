<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Berkas;

/**
 * BerkasSearch represents the model behind the search form of `frontend\models\Berkas`.
 */
class BerkasSearch extends Berkas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'biodata_id'], 'integer'],
            [['nama_berkas1', 'alamat_berkas1', 'nama_berkas2', 'alamat_berkas2', 'nama_berkas3', 'alamat_berkas3', 'nama_berkas4', 'alamat_berkas4', 'nama_berkas5', 'alamat_berkas5', 'nama_berkas6', 'alamat_berkas6', 'nama_berkas7', 'alamat_berkas7', 'nama_berkas8', 'alamat_berkas8', 'nama_berkas9', 'alamat_berkas9', 'nama_berkas10', 'alamat_berkas10', 'nama_berkas11', 'alamat_berkas11', 'nama_berkas12', 'alamat_berkas12', 'nama_berkas13', 'alamat_berkas13', 'nama_berkas14', 'alamat_berkas14', 'nama_berkas15', 'alamat_berkas15', 'nama_berkas16', 'alamat_berkas16', 'nama_berkas17', 'alamat_berkas17', 'nama_berkas18', 'alamat_berkas18', 'nama_berkas19', 'alamat_berkas19', 'nama_berkas20', 'alamat_berkas20', 'nama_berkas21', 'alamat_berkas21', 'nama_berkas22', 'alamat_berkas22', 'nama_berkas23', 'alamat_berkas23', 'nama_berkas24', 'alamat_berkas24'], 'safe'],
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
        $query = Berkas::find();

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
            'biodata_id' => $this->biodata_id,
        ]);

        $query->andFilterWhere(['like', 'nama_berkas1', $this->nama_berkas1])
            ->andFilterWhere(['like', 'alamat_berkas1', $this->alamat_berkas1])
            ->andFilterWhere(['like', 'nama_berkas2', $this->nama_berkas2])
            ->andFilterWhere(['like', 'alamat_berkas2', $this->alamat_berkas2])
            ->andFilterWhere(['like', 'nama_berkas3', $this->nama_berkas3])
            ->andFilterWhere(['like', 'alamat_berkas3', $this->alamat_berkas3])
            ->andFilterWhere(['like', 'nama_berkas4', $this->nama_berkas4])
            ->andFilterWhere(['like', 'alamat_berkas4', $this->alamat_berkas4])
            ->andFilterWhere(['like', 'nama_berkas5', $this->nama_berkas5])
            ->andFilterWhere(['like', 'alamat_berkas5', $this->alamat_berkas5])
            ->andFilterWhere(['like', 'nama_berkas6', $this->nama_berkas6])
            ->andFilterWhere(['like', 'alamat_berkas6', $this->alamat_berkas6])
            ->andFilterWhere(['like', 'nama_berkas7', $this->nama_berkas7])
            ->andFilterWhere(['like', 'alamat_berkas7', $this->alamat_berkas7])
            ->andFilterWhere(['like', 'nama_berkas8', $this->nama_berkas8])
            ->andFilterWhere(['like', 'alamat_berkas8', $this->alamat_berkas8])
            ->andFilterWhere(['like', 'nama_berkas9', $this->nama_berkas9])
            ->andFilterWhere(['like', 'alamat_berkas9', $this->alamat_berkas9])
            ->andFilterWhere(['like', 'nama_berkas10', $this->nama_berkas10])
            ->andFilterWhere(['like', 'alamat_berkas10', $this->alamat_berkas10])
            ->andFilterWhere(['like', 'nama_berkas11', $this->nama_berkas11])
            ->andFilterWhere(['like', 'alamat_berkas11', $this->alamat_berkas11])
            ->andFilterWhere(['like', 'nama_berkas12', $this->nama_berkas12])
            ->andFilterWhere(['like', 'alamat_berkas12', $this->alamat_berkas12])
            ->andFilterWhere(['like', 'nama_berkas13', $this->nama_berkas13])
            ->andFilterWhere(['like', 'alamat_berkas13', $this->alamat_berkas13])
            ->andFilterWhere(['like', 'nama_berkas14', $this->nama_berkas14])
            ->andFilterWhere(['like', 'alamat_berkas14', $this->alamat_berkas14])
            ->andFilterWhere(['like', 'nama_berkas15', $this->nama_berkas15])
            ->andFilterWhere(['like', 'alamat_berkas15', $this->alamat_berkas15])
            ->andFilterWhere(['like', 'nama_berkas16', $this->nama_berkas16])
            ->andFilterWhere(['like', 'alamat_berkas16', $this->alamat_berkas16])
            ->andFilterWhere(['like', 'nama_berkas17', $this->nama_berkas17])
            ->andFilterWhere(['like', 'alamat_berkas17', $this->alamat_berkas17])
            ->andFilterWhere(['like', 'nama_berkas18', $this->nama_berkas18])
            ->andFilterWhere(['like', 'alamat_berkas18', $this->alamat_berkas18])
            ->andFilterWhere(['like', 'nama_berkas19', $this->nama_berkas19])
            ->andFilterWhere(['like', 'alamat_berkas19', $this->alamat_berkas19])
            ->andFilterWhere(['like', 'nama_berkas20', $this->nama_berkas20])
            ->andFilterWhere(['like', 'alamat_berkas20', $this->alamat_berkas20])
            ->andFilterWhere(['like', 'nama_berkas21', $this->nama_berkas21])
            ->andFilterWhere(['like', 'alamat_berkas21', $this->alamat_berkas21])
            ->andFilterWhere(['like', 'nama_berkas22', $this->nama_berkas22])
            ->andFilterWhere(['like', 'alamat_berkas22', $this->alamat_berkas22])
            ->andFilterWhere(['like', 'nama_berkas23', $this->nama_berkas23])
            ->andFilterWhere(['like', 'alamat_berkas23', $this->alamat_berkas23])
            ->andFilterWhere(['like', 'nama_berkas24', $this->nama_berkas24])
            ->andFilterWhere(['like', 'alamat_berkas24', $this->alamat_berkas24]);

        return $dataProvider;
    }
}
