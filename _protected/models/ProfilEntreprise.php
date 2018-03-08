<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profil_entreprise".
 *
 * @property string $idprofil_entreprise
 * @property string $nom_firme
 * @property double $capital_social
 * @property string $nationalite
 * @property string $ref_moniteur
 * @property string $ref_journal
 * @property string $date_constitution
 * @property string $adresse
 * @property string $departement
 * @property string $commune
 * @property string $section_communale
 * @property string $telephone
 * @property string $email
 * @property string $site_web
 * @property string $nif
 * @property string $patente
 * @property string $prenom_mandataire
 * @property string $nom_mandataire
 * @property string $profession_mandataire
 * @property string $specialisation_mandataire
 * @property string $telephone_mandataire
 * @property string $email_mandataire
 * @property string $document_identite_valide
 * @property string $is_document_autre
 * @property string $numero_identite_valide
 * @property string $id_international
 * @property string $experience
 * @property double $montant_eleve
 * @property double $montant_faible
 *
 * @property CategoriesData[] $categoriesDatas
 * @property RessourcesH[] $ressourcesHes
 * @property RessourcesM[] $ressourcesMs
 * @property SecteursActivitesData[] $secteursActivitesDatas
 */
class ProfilEntreprise extends \yii\db\ActiveRecord
{
	public $categorie;
	public $autre_categorie;
	
	public $firme_construction;
	public $autre_firme_construction;
	
	public $tech_info;
	public $autre_tech_info;
	
	public $compt_finan_mana;
	public $autre_compt_finan_mana;
	
	public $renforcement_inst;
	public $autre_renforcement_inst;
	
	public $autre_secteur_sa;
	
	public $nom_r;
	public $prenom_r;
	public $competences_r;
	public $niveau_r;
	
	public $nom_r1;
	public $prenom_r1;
	public $competences_r1;
	public $niveau_r1;
	
	public $equipement;
	public $quantite;
	
	public $equipement1;
	public $quantite1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profil_entreprise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom_firme', 'patente', 'nif', 'telephone', 'email', 'numero_identite_valide', 
              'capital_social', 'date_constitution', 'prenom_mandataire', 'nom_mandataire',
              'telephone_mandataire', 'email_mandataire'], 'required'],
           /*  [['idprofil_entreprise'], 'integer'], */
            [['nom_firme', 'nationalite', 'ref_moniteur', 'ref_journal', 'adresse', 'departement',
              'commune', 'section_communale', 'telephone', 'email', 'site_web', 'nif', 'patente', 
              'prenom_mandataire', 'nom_mandataire', 'profession_mandataire', 'specialisation_mandataire', 
              'telephone_mandataire', 'email_mandataire', 'document_identite_valide', 'is_document_autre', 
              'numero_identite_valide', 'id_international', 'experience','nom_r', 'prenom_r', 'competences_r', 
              'niveau_r', 'nom_r1','prenom_r1', 'competences_r1', 'niveau_r1', 'equipement', 'equipement1',
              'autre_categorie', 'autre_firme_construction', 'autre_tech_info', 'autre_compt_finan_mana',
            ], 'string'],
            [[ 'quantite', 'quantite1'], 'number'],
        	[['nom_firme', 'patente', 'nif', 'telephone', 'email', 'numero_identite_valide'], 'unique'],
            [['date_constitution', 'categorie', 'tech_info', 'compt_finan_mana', 'renforcement_inst', 
            'autre_secteur_sa', 'firme_construction', 'montant_eleve', 'montant_faible'], 'safe'],
        	//[['capital_social'], 'double'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprofil_entreprise' => Yii::t('app', 'Idprofil Entreprise'),
            'nom_firme' => Yii::t('app', 'Nom de la Firme'),
            'capital_social' => Yii::t('app', 'Capital Social'),
            'nationalite' => Yii::t('app', 'Nationalite'),
            'ref_moniteur' => Yii::t('app', 'Ref Moniteur'),
            'ref_journal' => Yii::t('app', 'Ref Journal'),
            'date_constitution' => Yii::t('app', 'Date Constitution'),
            'adresse' => Yii::t('app', 'Adresse'),
            'departement' => Yii::t('app', 'Departement'),
            'commune' => Yii::t('app', 'Commune'),
            'section_communale' => Yii::t('app', 'Section Communale'),
            'telephone' => Yii::t('app', 'Telephone'),
            'email' => Yii::t('app', 'Email'),
            'site_web' => Yii::t('app', 'Site Web'),
            'nif' => Yii::t('app', 'Nif'),
            'patente' => Yii::t('app', 'Patente'),
            'prenom_mandataire' => Yii::t('app', 'Prenom'),
            'nom_mandataire' => Yii::t('app', 'Nom'),
            'profession_mandataire' => Yii::t('app', 'Profession'),
            'specialisation_mandataire' => Yii::t('app', 'Specialisation'),
            'telephone_mandataire' => Yii::t('app', 'Telephone'),
            'email_mandataire' => Yii::t('app', 'Email'),
            'document_identite_valide' => Yii::t('app', 'Document Identite Valide'),
            'is_document_autre' => Yii::t('app', 'Autre Document'),
            'numero_identite_valide' => Yii::t('app', 'Numero Identite Valide'),
            'id_international' => Yii::t('app', 'Id International'),
            'experience' => Yii::t('app', 'Experience'),
            'montant_eleve' => Yii::t('app', 'Montant Eleve'),
            'montant_faible' => Yii::t('app', 'Montant Faible'),
        	'categorie' => Yii::t('app', 'Categorie'),
        	'tech_info' => Yii::t('app', 'Technologie et Informatique'),
        	'compt_finan_mana' => Yii::t('app', 'Comptabilite, Finance et Management'),
        	'renforcement_inst' => Yii::t('app', 'Renforcement institutionnel'),
        	'autre_secteur_sa' => Yii::t('app', 'Autre  Secteur'),
        	'nom_r' => Yii::t('app', 'Nom'),
        	'prenom_r' => Yii::t('app', 'Prenom'),
        	'competences_r' => Yii::t('app', 'Competences'),
        	'niveau_r' => Yii::t('app', 'Niveau'),
        	'nom_r1' => Yii::t('app', 'Nom'),
        	'prenom_r1' => Yii::t('app', 'Prenom'),
        	'competences_r1' => Yii::t('app', 'Competences'),
        	'niveau_r1' => Yii::t('app', 'Niveau'),
        	'equipement' => Yii::t('app', 'Equipement'),
        	'quantite' => Yii::t('app', 'Quantite'),
        	'equipement1' => Yii::t('app', 'Equipement'),
        	'quantite1' => Yii::t('app', 'Quantite'),
        	'autre_categorie' => Yii::t('app', 'Autre categorie'),
        	'autre_firme_construction' => Yii::t('app', 'Autre type firme'),
        	'autre_tech_info' => Yii::t('app', 'Autre type tech'),
        	'autre_compt_finan_mana' => Yii::t('app', 'Autre type'),
        	'autre_renforcement_inst' => Yii::t('app', 'Autre renforcement'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesDatas()
    {
        return $this->hasMany(CategoriesData::className(), ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRessourcesHes()
    {
        return $this->hasMany(RessourcesH::className(), ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRessourcesMs()
    {
        return $this->hasMany(RessourcesM::className(), ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecteursActivitesDatas()
    {
        return $this->hasMany(SecteursActivitesData::className(), ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']);
    }
}
