<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesM */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ressources-m-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idressources_m')->textInput() ?>

    <?= $form->field($model, 'equipement')->textInput() ?>

    <?= $form->field($model, 'quantite')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <?= $form->field($model, 'profil_entreprise_idprofil_entreprise')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
