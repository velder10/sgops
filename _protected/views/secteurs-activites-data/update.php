<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivitesData */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Secteurs Activites Data',
]) . $model->idsecteurs_activites_data;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secteurs Activites Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsecteurs_activites_data, 'url' => ['view', 'idsecteurs_activites_data' => $model->idsecteurs_activites_data, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise, 'secteurs_activites_idsecteurs_activites' => $model->secteurs_activites_idsecteurs_activites]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="secteurs-activites-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
