<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Biodata;

/**
 * BiodataSearch represents the model behind the search form of `frontend\models\Biodata`.
 */
class BiodataSearch extends Biodata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'jabatan', 'prodi', 'jurusan'], 'integer'],
            [['nama_lengkap', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pendidikan', 'pangkat', 'position', 'work_unit'], 'safe'],
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
        $query = Biodata::find();

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
            'user_id' => $this->user_id,
            'jabatan' => $this->jabatan,
            'prodi' => $this->prodi,
            'jurusan' => $this->jurusan,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'pangkat', $this->pangkat])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'work_unit', $this->work_unit]);

        return $dataProvider;
    }
}
