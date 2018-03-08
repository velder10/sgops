<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivitesData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secteurs-activites-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsecteurs_activites_data')->textInput() ?>

    <?= $form->field($model, 'profil_entreprise_idprofil_entreprise')->textInput() ?>

    <?= $form->field($model, 'secteurs_activites_idsecteurs_activites')->textInput() ?>

    <?= $form->field($model, 'libelle')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
