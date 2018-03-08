<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories_data".
 *
 * @property string $idcategories_data
 * @property string $profil_entreprise_idprofil_entreprise
 * @property integer $categories_idcategories
 * @property string $libelle
 * @property integer $createdBy
 * @property string $createdOn
 *
 * @property Categories $categoriesIdcategories
 * @property ProfilEntreprise $profilEntrepriseIdprofilEntreprise
 */
class CategoriesData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategories_data', 'profil_entreprise_idprofil_entreprise', 'categories_idcategories'], 'required'],
            [['idcategories_data', 'profil_entreprise_idprofil_entreprise', 'categories_idcategories', 'createdBy'], 'integer'],
            [['libelle'], 'string'],
            [['createdOn'], 'safe'],
            [['categories_idcategories'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_idcategories' => 'idcategories']],
            [['profil_entreprise_idprofil_entreprise'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilEntreprise::className(), 'targetAttribute' => ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategories_data' => Yii::t('app', 'Idcategories Data'),
            'profil_entreprise_idprofil_entreprise' => Yii::t('app', 'Profil Entreprise Idprofil Entreprise'),
            'categories_idcategories' => Yii::t('app', 'Categories'),
            'libelle' => Yii::t('app', 'Libelle'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createdOn' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesIdcategories()
    {
        return $this->hasOne(Categories::className(), ['idcategories' => 'categories_idcategories']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilEntrepriseIdprofilEntreprise()
    {
        return $this->hasOne(ProfilEntreprise::className(), ['idprofil_entreprise' => 'profil_entreprise_idprofil_entreprise']);
    }
    
    public function getCatDrop(CategoriesData $categorie){
    	$result = array();
    	
    	foreach ($categorie as $data){
    		$result[] = $data['categories_idcategories'];
    	}
    	
    	return $result;
    }
}
