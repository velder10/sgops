<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesM */

$this->title = $model->idressources_m;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Ms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ressources-m-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idressources_m' => $model->idressources_m, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idressources_m' => $model->idressources_m, 
        		'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise], [
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
            'idressources_m',
            'equipement',
            'quantite',
            'createdBy',
            'createdOn',
            'profil_entreprise_idprofil_entreprise',
        ],
    ]) ?>

</div>
