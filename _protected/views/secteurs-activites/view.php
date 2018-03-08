<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivites */

$this->title = Yii::t('app', 'Secteurs Activites').' '.$model->nom;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secteurs Activites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secteurs-activites-view">

	<header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                   <h1 class="content-max-width">
                       <?= Html::encode($model->nom) ?>
                       <span class="pull-right">
                       <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      
					      <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idsecteurs_activites], ['class' => 'btn btn-primary']) ?>
					        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idsecteurs_activites], [
					            'class' => 'btn btn-danger',
					            'data' => [
					                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					                'method' => 'post',
					            ],
					        ]) ?>
					   </span>
                   </h1>
              </div>
        </div>
    </header>

    <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-9">
                		<?= DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            'idsecteurs_activites',
					            'secteur',
					            'nom',
					            'libelle',
					            'usersecteur',
					            'createdOn',
					        ],
					    ]) ?>
                	</div>
                </div>
            </div>
</div>
