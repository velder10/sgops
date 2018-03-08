<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivitesDataSrch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secteurs-activites-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsecteurs_activites_data') ?>

    <?= $form->field($model, 'profil_entreprise_idprofil_entreprise') ?>

    <?= $form->field($model, 'secteurs_activites_idsecteurs_activites') ?>

    <?= $form->field($model, 'libelle') ?>

    <?= $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
