<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesMSrch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ressources-m-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idressources_m') ?>

    <?= $form->field($model, 'equipement') ?>

    <?= $form->field($model, 'quantite') ?>

    <?= $form->field($model, 'createdBy') ?>

    <?= $form->field($model, 'createdOn') ?>

    <?php // echo $form->field($model, 'profil_entreprise_idprofil_entreprise') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
