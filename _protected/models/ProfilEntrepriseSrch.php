<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProfilEntreprise;

/**
 * ProfilEntrepriseSrch represents the model behind the search form about `app\models\ProfilEntreprise`.
 */
class ProfilEntrepriseSrch extends ProfilEntreprise
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprofil_entreprise'], 'integer'],
            [['nom_firme', 'nationalite', 'ref_moniteur', 'ref_journal', 'date_constitution', 'adresse', 'departement', 'commune', 'section_communale', 'telephone', 'email', 'site_web', 'nif', 'patente', 'prenom_mandataire', 'nom_mandataire', 'profession_mandataire', 'specialisation_mandataire', 'telephone_mandataire', 'email_mandataire', 'document_identite_valide', 'is_document_autre', 'numero_identite_valide', 'id_international', 'experience'], 'safe'],
            [['capital_social', 'montant_eleve', 'montant_faible'], 'number'],
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
        $query = ProfilEntreprise::find();

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
            'idprofil_entreprise' => $this->idprofil_entreprise,
            'capital_social' => $this->capital_social,
            'date_constitution' => $this->date_constitution,
            'montant_eleve' => $this->montant_eleve,
            'montant_faible' => $this->montant_faible,
        ]);

        $query->andFilterWhere(['like', 'nom_firme', $this->nom_firme])
            ->andFilterWhere(['like', 'nationalite', $this->nationalite])
            ->andFilterWhere(['like', 'ref_moniteur', $this->ref_moniteur])
            ->andFilterWhere(['like', 'ref_journal', $this->ref_journal])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'departement', $this->departement])
            ->andFilterWhere(['like', 'commune', $this->commune])
            ->andFilterWhere(['like', 'section_communale', $this->section_communale])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site_web', $this->site_web])
            ->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'patente', $this->patente])
            ->andFilterWhere(['like', 'prenom_mandataire', $this->prenom_mandataire])
            ->andFilterWhere(['like', 'nom_mandataire', $this->nom_mandataire])
            ->andFilterWhere(['like', 'profession_mandataire', $this->profession_mandataire])
            ->andFilterWhere(['like', 'specialisation_mandataire', $this->specialisation_mandataire])
            ->andFilterWhere(['like', 'telephone_mandataire', $this->telephone_mandataire])
            ->andFilterWhere(['like', 'email_mandataire', $this->email_mandataire])
            ->andFilterWhere(['like', 'document_identite_valide', $this->document_identite_valide])
            ->andFilterWhere(['like', 'is_document_autre', $this->is_document_autre])
            ->andFilterWhere(['like', 'numero_identite_valide', $this->numero_identite_valide])
            ->andFilterWhere(['like', 'id_international', $this->id_international])
            ->andFilterWhere(['like', 'experience', $this->experience]);

        return $dataProvider;
    }
}
