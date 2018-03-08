<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ressources-h-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idressources_h')->textInput() ?>

    <?= $form->field($model, 'prenom')->textInput() ?>

    <?= $form->field($model, 'nom')->textInput() ?>

    <?= $form->field($model, 'competences')->textInput() ?>

    <?= $form->field($model, 'niveau')->textInput() ?>

    <?= $form->field($model, 'isAutres')->textInput() ?>

    <?= $form->field($model, 'Autres')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <?= $form->field($model, 'profil_entreprise_idprofil_entreprise')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
