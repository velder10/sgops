<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ressources_m".
 *
 * @property string $idressources_m
 * @property string $equipement
 * @property integer $quantite
 * @property integer $createdBy
 * @property string $createdOn
 * @property string $profil_entreprise_idprofil_entreprise
 *
 * @property ProfilEntreprise $profilEntrepriseIdprofilEntreprise
 */
class RessourcesM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ressources_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idressources_m', 'quantite', 'createdBy', 'createdOn', 'profil_entreprise_idprofil_entreprise'], 'required'],
            [['idressources_m', 'createdBy', 'profil_entreprise_idprofil_entreprise'], 'integer'],
            [['equipement'], 'string'],
            [['createdOn', 'quantite'], 'safe'],
            [['profil_entreprise_idprofil_entreprise'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilEntreprise::className(), 'targetAttribute' => ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idressources_m' => Yii::t('app', 'Idressources M'),
            'equipement' => Yii::t('app', 'Equipement'),
            'quantite' => Yii::t('app', 'Quantite'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createdOn' => Yii::t('app', 'Created On'),
            'profil_entreprise_idprofil_entreprise' => Yii::t('app', 'Profil Entreprise Idprofil Entreprise'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilEntrepriseIdprofilEntreprise()
    {
        return $this->hasOne(ProfilEntreprise::className(), ['idprofil_entreprise' => 'profil_entreprise_idprofil_entreprise']);
    }
}
