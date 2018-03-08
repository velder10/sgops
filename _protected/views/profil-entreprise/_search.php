<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilEntrepriseSrch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profil-entreprise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idprofil_entreprise') ?>

    <?= $form->field($model, 'nom_firme') ?>

    <?= $form->field($model, 'capital_social') ?>

    <?= $form->field($model, 'nationalite') ?>

    <?= $form->field($model, 'ref_moniteur') ?>

    <?php // echo $form->field($model, 'ref_journal') ?>

    <?php // echo $form->field($model, 'date_constitution') ?>

    <?php // echo $form->field($model, 'adresse') ?>

    <?php // echo $form->field($model, 'departement') ?>

    <?php // echo $form->field($model, 'commune') ?>

    <?php // echo $form->field($model, 'section_communale') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'site_web') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'patente') ?>

    <?php // echo $form->field($model, 'prenom_mandataire') ?>

    <?php // echo $form->field($model, 'nom_mandataire') ?>

    <?php // echo $form->field($model, 'profession_mandataire') ?>

    <?php // echo $form->field($model, 'specialisation_mandataire') ?>

    <?php // echo $form->field($model, 'telephone_mandataire') ?>

    <?php // echo $form->field($model, 'email_mandataire') ?>

    <?php // echo $form->field($model, 'document_identite_valide') ?>

    <?php // echo $form->field($model, 'is_document_autre') ?>

    <?php // echo $form->field($model, 'numero_identite_valide') ?>

    <?php // echo $form->field($model, 'id_international') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'montant_eleve') ?>

    <?php // echo $form->field($model, 'montant_faible') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
