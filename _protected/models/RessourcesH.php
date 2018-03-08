<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ressources_h".
 *
 * @property string $idressources_h
 * @property string $prenom
 * @property string $nom
 * @property string $competences
 * @property string $niveau
 * @property integer $isAutres
 * @property string $Autres
 * @property integer $createdBy
 * @property string $createdOn
 * @property string $profil_entreprise_idprofil_entreprise
 *
 * @property ProfilEntreprise $profilEntrepriseIdprofilEntreprise
 */
class RessourcesH extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ressources_h';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idressources_h', 'profil_entreprise_idprofil_entreprise'], 'required'],
            [['idressources_h', 'isAutres', 'createdBy', 'profil_entreprise_idprofil_entreprise'], 'integer'],
            [['prenom', 'nom', 'competences', 'niveau', 'Autres'], 'string'],
            [['createdOn'], 'safe'],
            [['profil_entreprise_idprofil_entreprise'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilEntreprise::className(), 'targetAttribute' => ['profil_entreprise_idprofil_entreprise' => 'idprofil_entreprise']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idressources_h' => Yii::t('app', 'Idressources H'),
            'prenom' => Yii::t('app', 'Prenom'),
            'nom' => Yii::t('app', 'Nom'),
            'competences' => Yii::t('app', 'Competences'),
            'niveau' => Yii::t('app', 'Niveau'),
            'isAutres' => Yii::t('app', 'Is Autres'),
            'Autres' => Yii::t('app', 'Autres'),
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
