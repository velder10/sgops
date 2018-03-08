<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Categories;
use app\models\User;
use app\models\SecteursActivites;
use app\models\CategoriesData;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\ProfilEntreprise */

$this->title = $model->nom_firme;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profil Entreprises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


//$offcat = $catform->getCatDrop($categorie);
$listcategorie = ArrayHelper::map(Categories::find()->asArray()->all(), 'idcategories', 'nom');

$script = <<< JS
function showAutre(str) {
	if(str == 'autre'){
		var divOne11 = document.getElementById('autres');
        divOne11.style.display='block';
	}else{
		var divOne11 = document.getElementById('autres');
        divOne11.style.display='none';
	}
}
JS;
$this->registerJs($script, \yii\web\View::POS_END);


$listfirme = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Firme de construction'])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme["Autre"] = "Autre";
//$listfirme = array_merge($listfirme, ["Autre" => "Autre"]);

$listfirme1 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Technologie et Informatique'])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme1["Autre"] = "Autre";

$listfirme2 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Comptabilite, Finance et Management'])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme2["Autre"] = "Autre";

$listfirme3 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Renforcement institutionnel '])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme3["Autre"] = "Autre";


$script = <<< JS
(function($) {
$(document).ready(function(){
	
	$("#firme-ik").on("change", function() {
		var string = $(this).val();
		if(string.indexOf("Autre") >= 0){
			var divOne11 = document.getElementById('firme');
        	divOne11.style.display='block';
		}else{
			var divOne11 = document.getElementById('firme');
        	divOne11.style.display='none';
		}
    });

	$("#tech_info-ik").on("change", function() {
		var string = $(this).val();
		if(string.indexOf("Autre") >= 0){
			var divOne11 = document.getElementById('tech_info');
        	divOne11.style.display='block';
		}else{
			var divOne11 = document.getElementById('tech_info');
        	divOne11.style.display='none';
		}
    });

	$("#compt_finan_mana-ik").on("change", function() {
		var string = $(this).val();
		if(string.indexOf("Autre") >= 0){
			var divOne11 = document.getElementById('compt_finan_mana');
        	divOne11.style.display='block';
		}else{
			var divOne11 = document.getElementById('compt_finan_mana');
        	divOne11.style.display='none';
		}
    });

	$("#renforcement_inst-ik").on("change", function() {
		var string = $(this).val();
		if(string.indexOf("Autre") >= 0){
			var divOne11 = document.getElementById('renforcement_inst');
        	divOne11.style.display='block';
		}else{
			var divOne11 = document.getElementById('renforcement_inst');
        	divOne11.style.display='none';
		}
    });

});
})(jQuery);
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
<div class="profil-entreprise-view">

     <header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                   <h1 class="content-max-width">
                       <?= Html::encode($model->nom_firme) ?>
                       <span class="pull-right">
                       	  <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      <?php if(Yii::$app->user->can('admin') && ($model->isValidate != 1)):?>
		                  		<?= Html::a(Yii::t('app', 'Validation'), ['validation', 'id' => $model->idprofil_entreprise], 
		                  			['class' => 'btn btn-primary']) ?>
		                  <?php endif; ?>
		                  
		                  <?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  	<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idprofil_entreprise], ['class' => 'btn btn-primary']) ?>
					      	<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idprofil_entreprise], [
					           'class' => 'btn btn-danger',
					           'data' => [
					              'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					              'method' => 'post',
					           ],
					      ]) ?>
		                  <?php endif; ?>
		                  
					   </span>
                   </h1>
              </div>
        </div>
    </header>
    
    <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-6">
                		<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprofil_entreprise',
            'nom_firme',
            'capital_social',
            'nationalite',
            'ref_moniteur',
            'ref_journal',
            'date_constitution',
            'adresse',
            'departement',
            'commune',
            'section_communale',
            'telephone',
            'email:email',
            'site_web',
            'nif',
            'patente',
            'prenom_mandataire',
            'nom_mandataire',
            'profession_mandataire',
            'specialisation_mandataire',
            'telephone_mandataire',
            'email_mandataire:email',
            'document_identite_valide',
            'is_document_autre',
            'numero_identite_valide',
            'id_international',
            'experience',
            'montant_eleve',
            'montant_faible',
        ],
    ]) ?>
                	</div>
                	<div class="col-lg-6">
                		<div class="box">
				            <div class="box-header">
					              <h3 class="box-title">Categorie</h3>
					              <?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
						              <!-- tools box -->
					                  <div class="pull-right box-tools">
					                  	 <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
	                                      <i class="glyphicon glyphicon-plus"></i></a>
					                  </div><!-- /. tools -->
				                  <?php endif; ?>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body no-padding">
				              <table class="table table-striped">
				              	<?php foreach ($categorie as $data): ?>
				              		<tr>
				              			<td>
		                  					<?php 
		                  						$cat = Categories::findOne($data['categories_idcategories']);
		                  						echo $cat->nom ?></td>
		                  				<td>
		                  					<?php 
		                  						$user = User::findOne($data['createdBy']);
		                  						echo $user->username ?></td>
		                  				<td><?= $data['createdOn']?></td>
		                  				<td>
		                  					<?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  					 
			                  					<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
				                  						 ['/categories-data/delete', 'id' => $data['idcategories_data']],
						                    			 ['class' => 'btn btn-danger', 'data' => [
									              		 'confirm' => Yii::t('app', 'Are you sure you want to delete this data?'),
									               		 'method' => 'post',
									          	 ],]);?>
								          	 <?php endif; ?>
							          	 
							          	</td>
				              		</tr>
				              	<?php endforeach;?>
				              </table>
				            </div>
				        </div>
				        
				        <div class="box">
				            <div class="box-header">
				              <h3 class="box-title">Secteurs Activites</h3>
				              <?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  	  <!-- tools box -->
				                  <div class="pull-right box-tools">
				                  	 <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal5">
                                      <i class="glyphicon glyphicon-plus"></i></a>
				                  </div><!-- /. tools -->
		                  	  <?php endif; ?>
				              
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body no-padding">
				              <table class="table table-striped">
				              	<?php foreach ($secteur as $data): ?>
				              		<tr>
				              			<td>
		                  					<?php 
		                  						$cat = SecteursActivites::findOne($data['secteurs_activites_idsecteurs_activites']);
		                  						echo $cat->nom ?></td>
		                  				<td>
		                  					<?php 
		                  						$user = User::findOne($data['createdBy']);
		                  						echo $user->username ?></td>
		                  				<td><?= $data['createdOn']?></td>
		                  				<td>
		                  				<?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  				<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
		                  						 ['/secteurs-activites-data/delete', 
		                  						 'idsecteurs_activites_data' => $data['idsecteurs_activites_data'],
		                  						 'profil_entreprise_idprofil_entreprise' => $data['profil_entreprise_idprofil_entreprise'],
		                  						 'secteurs_activites_idsecteurs_activites' => $data['secteurs_activites_idsecteurs_activites']
		                  						  ],
				                    			 ['class' => 'btn btn-danger', 'data' => [
							              		 'confirm' => Yii::t('app', 'Are you sure you want to delete this data?'),
							               		 'method' => 'post',
							          	 ],]);?>
		                  				<?php endif; ?>
		                  				</td>
				              		</tr>
				              	<?php endforeach;?>
				              </table>
				            </div>
				        </div>
				        
				        <div class="box">
				            <div class="box-header">
				              <h3 class="box-title">Ressources Humaines</h3>
				              <?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  	  <!-- tools box -->
				                  <div class="pull-right box-tools">
				                  	 <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal2">
                                      <i class="glyphicon glyphicon-plus"></i></a>
				                  </div><!-- /. tools -->
		                  	  <?php endif; ?>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body no-padding">
				              <table class="table table-striped">
				              	<?php foreach ($rh as $data): ?>
				              		<tr>
				              			<td><?= $data['prenom'].' '.$data['nom'] ?></td>
		                  				<td><?= $data['competences']?></td>
		                  				<td><?= $data['niveau']?></td>
		                  				<td>
		                  				<?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  					<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
		                  						 ['/ressources-h/delete', 
		                  						  'idressources_h' => $data['idressources_h'],
		                  						  'profil_entreprise_idprofil_entreprise' => $data['profil_entreprise_idprofil_entreprise']
		                  						  ],
				                    			 ['class' => 'btn btn-danger', 'data' => [
							              		 'confirm' => Yii::t('app', 'Are you sure you want to delete this data?'),
							               		 'method' => 'post',
							          	 ],]);?>
		                  				<?php endif; ?>
		                  				</td>
				              		</tr>
				              	<?php endforeach;?>
				              </table>
				            </div>
				        </div>
				        
				        <div class="box">
				            <div class="box-header">
				              <h3 class="box-title">Ressources Materiels</h3>
				              <?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  	  	<!-- tools box -->
				                  <div class="pull-right box-tools">
				                  	 <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal3">
                                      <i class="glyphicon glyphicon-plus"></i></a>
				                  </div><!-- /. tools -->
		                  	  <?php endif; ?>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body no-padding">
				              <table class="table table-striped">
				              	<?php foreach ($rm as $data): ?>
				              		<tr>
				              			<td><?= $data['equipement'] ?></td>
		                  				<td><?= $data['quantite']?></td>
		                  				<td><?= $data['createdOn']?></td>
		                  				<td>
		                  				<?php if(($model->isValidate != 1) || Yii::$app->user->can('admin')):?>
		                  					<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
		                  						 ['/ressources-m/delete', 
		                  						  'idressources_m' => $data['idressources_m'],
		                  						  'profil_entreprise_idprofil_entreprise' => $data['profil_entreprise_idprofil_entreprise']
		                  						  ],
				                    			 ['class' => 'btn btn-danger', 'data' => [
							              		 'confirm' => Yii::t('app', 'Are you sure you want to delete this data?'),
							               		 'method' => 'post',
							          	 ],]);?>
		                  				<?php endif; ?>
		                  				</td>
				              		</tr>
				              	<?php endforeach;?>
				              </table>
				            </div>
				        </div>
                	</div>
                </div>
            </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Ajouter une categorie </h4>
      </div>
      <div class="modal-body">
      <?php $form = ActiveForm::begin(); ?>
      	<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($catform, 'categories_idcategories')
    				->dropDownList($listcategorie, ['prompt'=>'--Choisir une categorie--']) ?>
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($catform, 'libelle')->textInput(['placeholder' => 'libelle']) ?>
    		</div>
    	</div>
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <?= Html::submitButton($catform->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $catform->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Ajouter une competence </h4>
      </div>
      <div class="modal-body">
      <?php $form = ActiveForm::begin(); ?>
      	<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($rhform, 'prenom')->textInput(['placeholder'=> 'prenom']) ?>
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($rhform, 'nom')->textInput(['placeholder'=> 'nom']) ?>
    		</div>
    	</div>
    		
		<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($rhform, 'competences')->textInput(['placeholder'=> 'competences']) ?>
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($rhform, 'niveau')
    			->dropDownList(['licence' => 'Licence', 'maitrise' => 'Maitrise', 'doctorat' => 'Doctorat', 'autre' => 'Autre'], 
    					['prompt'=>'-- Choisir un niveau --', 'onchange' => 'showAutre(this.value)']) ?>
    		</div>
    	</div>
		    
		<div class="row" id="autres" style="display:none;">
			<div class="col-md-6">
				<?= $form->field($rhform, 'Autres')->textInput() ?>
		    </div>
    	</div>
		
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <?= Html::submitButton($rhform->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $rhform->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Ajouter un materiel </h4>
      </div>
      <div class="modal-body">
      <?php $form = ActiveForm::begin(); ?>
      	<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($rmform, 'equipement')->textInput() ?>
    			
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($rmform, 'quantite')->widget(
				    MaskedInput::className(), [
				    	'clientOptions' => [
				    	'alias' =>  'integer',
				    	'groupSeparator' => '.',
				    	'autoGroup' => true
				   ],
				])->textInput(['placeholder' => 'quantite'])?>
    		</div>
    	</div>
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <?= Html::submitButton($rmform->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $rmform->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Ajouter un secteur d'activites </h4>
      </div>
      <div class="modal-body">
      <?php $form = ActiveForm::begin(); ?>
      	<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($saform, 'firme_construction2')->widget(Select2::classname(), [
						    				 'data' => $listfirme,
						    				 'language' => 'de',
						    				 'options' => ['multiple' => true, 'id'=> 'firme-ik',
						    				 		'placeholder' => 'choisir type...'],
						    				 'pluginOptions' => [
						    					'allowClear' => true
						    				 ],
						    			]);?>
				    				</div>
				    				<div class="col-md-5" id="firme" style="display:none;">
				    					<?= $form->field($saform, 'autre_firme_construction2')
			  							    ->textInput(['placeholder' => 'autre firme construction']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($saform, 'tech_info2')->widget(Select2::classname(), [
						    				 'data' => $listfirme1,
						    				 'language' => 'de',
						    				 'options' => ['multiple' => true, 'id'=> 'tech_info-ik',
						    				 		'placeholder' => 'choisir type...'],
						    				 'pluginOptions' => [
						    					'allowClear' => true
						    				 ],
						    			]);?>
				    				</div>
				    				<div class="col-md-5" id="tech_info" style="display:none;">
				    					<?= $form->field($saform, 'autre_tech_info2')
			  							    ->textInput(['placeholder' => 'autre type tech']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($saform, 'compt_finan_mana2')->widget(Select2::classname(), [
						    				 'data' => $listfirme2,
						    				 'language' => 'de',
						    				 'options' => ['multiple' => true, 'id'=> 'compt_finan_mana-ik',
						    				 		'placeholder' => 'choisir type...'],
						    				 'pluginOptions' => [
						    					'allowClear' => true
						    				 ],
						    			]);?>
				    				</div>
				    				<div class="col-md-5" id="compt_finan_mana" style="display:none;">
				    					<?= $form->field($saform, 'autre_compt_finan_mana2')
			  							    ->textInput(['placeholder' => 'autre type']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($saform, 'renforcement_inst2')->widget(Select2::classname(), [
						    				 'data' => $listfirme3,
						    				 'language' => 'de',
						    				 'options' => ['multiple' => true, 'id'=> 'renforcement_inst-ik',
						    				 		'placeholder' => 'choisir type...'],
						    				 'pluginOptions' => [
						    					'allowClear' => true
						    				 ],
						    			]);?>
				    				</div>
				    				<div class="col-md-5" id="renforcement_inst" style="display:none;">
				    					<?= $form->field($saform, 'autre_renforcement_inst2')
			  							    ->textInput(['placeholder' => 'autre renforcement']) ?>
				    				</div>
				    			</div>
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <?= Html::submitButton($rmform->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $rmform->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>