<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SecteursActivitesData;

/**
 * SecteursActivitesDataSrch represents the model behind the search form about `app\models\SecteursActivitesData`.
 */
class SecteursActivitesDataSrch extends SecteursActivitesData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsecteurs_activites_data', 'profil_entreprise_idprofil_entreprise', 'secteurs_activites_idsecteurs_activites', 'createdBy'], 'integer'],
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
        $query = SecteursActivitesData::find();

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
            'idsecteurs_activites_data' => $this->idsecteurs_activites_data,
            'profil_entreprise_idprofil_entreprise' => $this->profil_entreprise_idprofil_entreprise,
            'secteurs_activites_idsecteurs_activites' => $this->secteurs_activites_idsecteurs_activites,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
        ]);

        $query->andFilterWhere(['like', 'libelle', $this->libelle]);

        return $dataProvider;
    }
}
