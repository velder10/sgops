<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivites */

$this->title = Yii::t('app', 'Update {nameModel}: ', [
    'nameModel' => $model->nom,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secteurs Activites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsecteurs_activites, 'url' => ['view', 'id' => $model->idsecteurs_activites]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="secteurs-activites-update">
	
	<header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                    <h1 class="content-max-width">
                    	<?= Html::encode($model->nom) ?>
                    	
                    	<span class="pull-right">
                    	 	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      
                    	 </span>
                    	
                    </h1>
              </div>
        </div>
    </header>
    
    <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-9">
                		<div class="box">
				            <!-- /.box-header -->
				            <div class="box-body">
				            	 <?= $this->render('_form', [
							        'model' => $model,
							    ]) ?>
				            </div>
				        </div>
                	</div>
                </div>
            </div>

</div>
