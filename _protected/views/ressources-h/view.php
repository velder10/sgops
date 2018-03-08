<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RessourcesH */

$this->title = $model->idressources_h;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Hs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ressources-h-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idressources_h' => $model->idressources_h, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idressources_h' => $model->idressources_h, 
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
            'idressources_h',
            'prenom',
            'nom',
            'competences',
            'niveau',
            'isAutres',
            'Autres',
            'createdBy',
            'createdOn',
            'profil_entreprise_idprofil_entreprise',
        ],
    ]) ?>

</div>
