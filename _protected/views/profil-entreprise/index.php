<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfilEntrepriseSrch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'OPS');
$this->params['breadcrumbs'][] = $this->title;

$script = <<< JS
 $(function () {
   $("#example1").DataTable();
  });
JS;
$this->registerJs($script, \yii\web\View::POS_END);

?>
<div class="profil-entreprise-index">
	<!-- Content Header (Page header) -->
    <header class="content-header container-fluid">
        <div class="row">
             <div class="col-lg-12">
                  <h1 class="content-max-width">
                      <?= Html::encode($this->title) ?>
                      <span class="pull-right">
                            <?= Html::a(Yii::t('app', "Ajouter un OPS"), 
                            		['create'], ['class' => 'btn btn-success']) ?>
					  </span>
                  </h1>
             </div>
        </div>
   </header>
         
   <div class="box">
        <div class="box-header">
             <h3 class="box-title">Donnees des Operateurs de Prestations de Services</h3>
        </div>
        <div class="box-body">
         	 <table id="example1" class="table table-bordered table-striped">
         	 	<thead>
	                <tr>
	                  <th>Firme</th>
	                  <th>Capital Social</th>
	                  <th>Nationalite</th>
	                  <th>Mandataire</th>
	                  <th>Date Constitution</th>
	                  <th>Statut</th>
	                  <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	<?php foreach ($model as $data): ?>
		                <tr>
		                  <td><?= $data['nom_firme']?></td>
		                  <td><?= $data['capital_social']?></td>
		                  <td><?= $data['nationalite']?></td>
		                  <td><?= $data['prenom_mandataire'].' '.$data['nom_mandataire']?></td>
		                  <td><?= $data['date_constitution']?></td>
		                  <td>
		                  	<?php if($data['isValidate'] !== null && is_numeric($data['isValidate']) && $data['isValidate'] == 1):?>
		                  		<small class="label label-success"><i class="fa fa-clock-o"></i> Validate</small></td>
		                  	<?php elseif($data['isValidate'] === null):?>
		                  		<small class="label label-warning"><i class="fa fa-clock-o"></i> No Validate</small></td>
		                  	<?php endif; ?>
		                  <td>
		                  	<div class="btn-group">
		                  		<?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', 
		                    			['/profil-entreprise/view', 'id' => $data['idprofil_entreprise']], ['class' => 'btn btn-default']) ?>
			                  		
		                  		<?php if(($data['isValidate'] === null) 
		                  				&& (($data['createdBy'] == Yii::$app->user->identity->id) || (Yii::$app->user->can('admin')))):?>
		                  			<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
			                  			['delete', 'id' => $data['idprofil_entreprise']],
			                    		['class' => 'btn btn-danger', 'data' => [
						              	'confirm' => Yii::t('app', 'Are you sure you want to delete this data?'),
						               	'method' => 'post',
						          	 ],]);?>
		                  		<?php endif; ?>
		                  		
		                  		<?php if(($data['createdBy'] == Yii::$app->user->identity->id) || (Yii::$app->user->can('admin'))):?>
		                  		
		                  		<?php endif; ?>
		                  	</div>
		                  </td>
		                </tr>
	                <?php endforeach;?>
                </tbody>
         	 	<tfoot>
	                <tr>
	                  <th>Firme</th>
	                  <th>Capital Social</th>
	                  <th>Nationalite</th>
	                  <th>Mandataire</th>
	                  <th>Date Constitution</th>
	                  <th>Statut</th>
	                  <th>Action</th>
	                </tr>
	            </tfoot>
         	 </table>
        </div>
   </div>
</div>
