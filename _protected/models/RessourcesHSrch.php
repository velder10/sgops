<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RessourcesH;

/**
 * RessourcesHSrch represents the model behind the search form about `app\models\RessourcesH`.
 */
class RessourcesHSrch extends RessourcesH
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idressources_h', 'isAutres', 'createdBy', 'profil_entreprise_idprofil_entreprise'], 'integer'],
            [['prenom', 'nom', 'competences', 'niveau', 'Autres', 'createdOn'], 'safe'],
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
        $query = RessourcesH::find();

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
            'idressources_h' => $this->idressources_h,
            'isAutres' => $this->isAutres,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'profil_entreprise_idprofil_entreprise' => $this->profil_entreprise_idprofil_entreprise,
        ]);

        $query->andFilterWhere(['like', 'prenom', $this->prenom])
            ->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'competences', $this->competences])
            ->andFilterWhere(['like', 'niveau', $this->niveau])
            ->andFilterWhere(['like', 'Autres', $this->Autres]);

        return $dataProvider;
    }
}
