<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secteurs_activites_data".
 *
 * @property string $idsecteurs_activites_data
 * @property string $profil_entreprise_idprofil_entreprise
 * @property integer $secteurs_activites_idsecteurs_activites
 * @property string $libelle
 * @property integer $createdBy
 * @property string $createdOn
 *
 * @property ProfilEntreprise $profilEntrepriseIdprofilEntreprise
 * @property SecteursActivites $secteursActivitesIdsecteursActivites
 */
class SecteursActivitesData extends \yii\db\ActiveRecord
{
	public $firme_construction2;
	public $autre_firme_construction2;
	
	public $tech_info2;
	public $autre_tech_info2;
	
	public $compt_finan_mana2;
	public $autre_compt_finan_mana2;
	
	public $renforcement_inst2;
	public $autre_renforcement_inst2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secteurs_activites_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsecteurs_activites_data', 'profil_entreprise_idprofil_entreprise', 'secteurs_activites_idsecteurs_activites'], 'required'],
            [['idsecteurs_activites_data', 'profil_entreprise_idprofil_entreprise', 'secteurs_activites_idsecteurs_activites', 'createdBy'], 'integer'],
            [['libelle'], 'string'],
            [['createdOn', 'tech_info2', 'autre_tech_info2', 'compt_finan_mana2', 'autre_compt_finan_mana2', 'renforcement_inst2','autre_renforcement_inst2', 'firme_construction2', 'autre_firme_construction2'], 'safe'],
            [['profil_entreprise_idprofil_entreprise'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilEntreprise::className(), 'targetAttribute' => ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']],
            [['secteurs_activites_idsecteurs_activites'], 'exist', 'skipOnError' => true, 'targetClass' => SecteursActivites::className(), 'targetAttribute' => ['secteurs_activites_idsecteurs_activites' => 'idsecteurs_activites']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsecteurs_activites_data' => Yii::t('app', 'Idsecteurs Activites Data'),
            'profil_entreprise_idprofil_entreprise' => Yii::t('app', 'Profil Entreprise Idprofil Entreprise'),
            'secteurs_activites_idsecteurs_activites' => Yii::t('app', 'Secteurs Activites Idsecteurs Activites'),
            'libelle' => Yii::t('app', 'Libelle'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createdOn' => Yii::t('app', 'Created On'),
        	'firme_construction2' => Yii::t('app', 'Firme de construction'),
        	'autre_firme_construction2' => Yii::t('app', 'Autre type'),
        	'tech_info2' => Yii::t('app', 'Technologie et Informatique'),
        	'autre_tech_info2' => Yii::t('app', 'Autre type'),
        	'compt_finan_mana2' => Yii::t('app', 'Comptabilite, Finance et Management'),
        	'autre_compt_finan_mana2' => Yii::t('app', 'Autre type'),
        	'renforcement_inst2' => Yii::t('app', 'Renforcement institutionnel'),
        	'autre_renforcement_inst2' => Yii::t('app', 'Autre type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilEntrepriseIdprofilEntreprise()
    {
        return $this->hasOne(ProfilEntreprise::className(), ['idprofil_entreprise' => 'profil_entreprise_idprofil_entreprise']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecteursActivitesIdsecteursActivites()
    {
        return $this->hasOne(SecteursActivites::className(), ['idsecteurs_activites' => 'secteurs_activites_idsecteurs_activites']);
    }
}
