<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivitesData */

$this->title = $model->idsecteurs_activites_data;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secteurs Activites Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secteurs-activites-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idsecteurs_activites_data' => $model->idsecteurs_activites_data, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise, 'secteurs_activites_idsecteurs_activites' => $model->secteurs_activites_idsecteurs_activites], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idsecteurs_activites_data' => $model->idsecteurs_activites_data, 
        		'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise, 
        		'secteurs_activites_idsecteurs_activites' => $model->secteurs_activites_idsecteurs_activites], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsecteurs_activites_data',
            'profil_entreprise_idprofil_entreprise',
            'secteurs_activites_idsecteurs_activites',
            'libelle',
            'createdBy',
            'createdOn',
        ],
    ]) ?>

</div>
