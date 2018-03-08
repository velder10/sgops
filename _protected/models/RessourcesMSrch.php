<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RessourcesM;

/**
 * RessourcesMSrch represents the model behind the search form about `app\models\RessourcesM`.
 */
class RessourcesMSrch extends RessourcesM
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idressources_m', 'quantite', 'createdBy', 'profil_entreprise_idprofil_entreprise'], 'integer'],
            [['equipement', 'createdOn'], 'safe'],
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
        $query = RessourcesM::find();

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
            'idressources_m' => $this->idressources_m,
            'quantite' => $this->quantite,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'profil_entreprise_idprofil_entreprise' => $this->profil_entreprise_idprofil_entreprise,
        ]);

        $query->andFilterWhere(['like', 'equipement', $this->equipement]);

        return $dataProvider;
    }
}
