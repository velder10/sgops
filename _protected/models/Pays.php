<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pays".
 *
 * @property integer $id
 * @property integer $code
 * @property string $alpha2
 * @property string $alpha3
 * @property string $nom_en_gb
 * @property string $nom_fr_fr
 */
class Pays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'alpha2', 'alpha3', 'nom_en_gb', 'nom_fr_fr'], 'required'],
            [['code'], 'integer'],
            [['alpha2', 'alpha3', 'nom_en_gb', 'nom_fr_fr'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'alpha2' => Yii::t('app', 'Alpha2'),
            'alpha3' => Yii::t('app', 'Alpha3'),
            'nom_en_gb' => Yii::t('app', 'Nom En Gb'),
            'nom_fr_fr' => Yii::t('app', 'Nom Fr Fr'),
        ];
    }
}
