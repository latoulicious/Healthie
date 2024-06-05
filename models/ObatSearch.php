<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Obat;

/**
 * ObatSearch represents the model behind the search form of `app\models\Obat`.
 */
class ObatSearch extends Obat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['obat_id', 'stok'], 'integer'],
            [['nama_obat', 'kategori', 'bentuk', 'satuan', 'created_at', 'updated_at'], 'safe'],
            [['harga_beli', 'harga_jual'], 'number'],
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
        $query = Obat::find();

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
            'obat_id' => $this->obat_id,
            'stok' => $this->stok,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'nama_obat', $this->nama_obat])
            ->andFilterWhere(['ilike', 'kategori', $this->kategori])
            ->andFilterWhere(['ilike', 'bentuk', $this->bentuk])
            ->andFilterWhere(['ilike', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
