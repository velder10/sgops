<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cnigs".
 *
 * @property integer $cnigs_id
 * @property string $departement
 * @property string $arrondissement
 * @property string $commune
 * @property string $section
 * @property string $localite
 * @property string $source
 * @property integer $fid_1
 * @property string $lat_x
 * @property string $lng_y
 */
class Cnigs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cnigs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departement', 'arrondissement', 'commune', 'section', 'localite', 'source'], 'string'],
            [['fid_1'], 'required'],
            [['fid_1'], 'integer'],
            [['lat_x', 'lng_y'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cnigs_id' => Yii::t('app', 'Cnigs ID'),
            'departement' => Yii::t('app', 'Departement'),
            'arrondissement' => Yii::t('app', 'Arrondissement'),
            'commune' => Yii::t('app', 'Commune'),
            'section' => Yii::t('app', 'Section'),
            'localite' => Yii::t('app', 'Localite'),
            'source' => Yii::t('app', 'Source'),
            'fid_1' => Yii::t('app', 'Fid 1'),
            'lat_x' => Yii::t('app', 'Lat X'),
            'lng_y' => Yii::t('app', 'Lng Y'),
        ];
    }
}
