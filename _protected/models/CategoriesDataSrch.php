<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CategoriesData;

/**
 * CategoriesDataSrch represents the model behind the search form about `app\models\CategoriesData`.
 */
class CategoriesDataSrch extends CategoriesData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategories_data', 'profil_entreprise_idprofil_entreprise', 'categories_idcategories', 'createdBy'], 'integer'],
            [['libelle', 'createdOn'], 'safe'],
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
        $query = CategoriesData::find();

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
            'idcategories_data' => $this->idcategories_data,
            'profil_entreprise_idprofil_entreprise' => $this->profil_entreprise_idprofil_entreprise,
            'categories_idcategories' => $this->categories_idcategories,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
        ]);

        $query->andFilterWhere(['like', 'libelle', $this->libelle]);

        return $dataProvider;
    }
}
