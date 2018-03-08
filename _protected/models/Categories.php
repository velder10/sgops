<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $idcategories
 * @property string $nom
 * @property string $libelle
 * @property integer $createdBy
 * @property string $createdOn
 *
 * @property CategoriesData[] $categoriesDatas
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /* [['idcategories', 'createdBy', 'createdOn'], 'required'], */
            [[/* 'idcategories', */ 'createdBy'], 'integer'],
            [['nom', 'libelle'], 'string'],
            [['createdOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategories' => Yii::t('app', 'Id'),
            'nom' => Yii::t('app', 'Nom'),
            'libelle' => Yii::t('app', 'Libelle'),
            'createdBy' => Yii::t('app', 'Ajoute par'),
        	'usercategories' => Yii::t('app', 'Ajoute par'),
            'createdOn' => Yii::t('app', 'Ajoute le'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesDatas()
    {
        return $this->hasMany(CategoriesData::className(), ['categories_idcategories' => 'idcategories']);
    }
    
    public function getUsercategories()
    {
    	$user = User::findOne($this->createdBy);
    	return $user->username;
    }
}
