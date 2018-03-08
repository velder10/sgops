<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secteurs_activites".
 *
 * @property integer $idsecteurs_activites
 * @property string $secteur
 * @property string $nom
 * @property string $libelle
 * @property integer $createdBy
 * @property string $createdOn
 *
 * @property SecteursActivitesData[] $secteursActivitesDatas
 */
class SecteursActivites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secteurs_activites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /* [['idsecteurs_activites', 'createdBy', 'createdOn'], 'required'], */
            [[/* 'idsecteurs_activites',  */'createdBy'], 'integer'],
            [['secteur', 'nom', 'libelle'], 'string'],
            [['createdOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsecteurs_activites' => Yii::t('app', 'Idsecteurs Activites'),
            'secteur' => Yii::t('app', 'Secteur'),
            'nom' => Yii::t('app', 'Nom'),
            'libelle' => Yii::t('app', 'Libelle'),
            'createdBy' => Yii::t('app', 'Created By'),
        	'usersecteur' => Yii::t('app', 'Ajoute par'),
            'createdOn' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecteursActivitesDatas()
    {
        return $this->hasMany(SecteursActivitesData::className(), ['secteurs_activites_idsecteurs_activites' => 'idsecteurs_activites']);
    }
    
    public function getUsersecteur()
    {
    	$user = User::findOne($this->createdBy);
    	return $user->username;
    }
}
