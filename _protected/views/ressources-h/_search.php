<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesHSrch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ressources-h-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idressources_h') ?>

    <?= $form->field($model, 'prenom') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'competences') ?>

    <?= $form->field($model, 'niveau') ?>

    <?php // echo $form->field($model, 'isAutres') ?>

    <?php // echo $form->field($model, 'Autres') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <?php // echo $form->field($model, 'profil_entreprise_idprofil_entreprise') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
