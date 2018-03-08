<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesM */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ressources M',
]) . $model->idressources_m;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Ms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idressources_m, 'url' => ['view', 'idressources_m' => $model->idressources_m, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ressources-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
