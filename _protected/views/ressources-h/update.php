<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesH */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ressources H',
]) . $model->idressources_h;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Hs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idressources_h, 'url' => ['view', 'idressources_h' => $model->idressources_h, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ressources-h-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
