<?php

use yii\helpers\Html;
use app\models\CategoriesData;
use yii\widgets\MaskedInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use app\models\Categories;
use yii\helpers\ArrayHelper;
use app\models\SecteursActivites;
use kartik\widgets\Typeahead;
use app\models\Cnigs;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use app\models\Pays;
/* @var $this yii\web\View */
/* @var $model app\models\ProfilEntreprise */
/* @var $form yii\widgets\ActiveForm */


$listdepart = ArrayHelper::map(Cnigs::find()->distinct(TRUE)->asArray()->all(), 'departement', 'departement');

$listcategorie = ArrayHelper::map(Categories::find()->asArray()->all(), 'idcategories', 'nom');
//$listcategorie = array_push($listcategorie, "Autre");

$listfirme = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Firme de construction'])
				->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme["Autre"] = "Autre";

$listfirme1 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Technologie et Informatique'])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme1["Autre"] = "Autre";

$listfirme2 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Comptabilite, Finance et Management'])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme2["Autre"] = "Autre";

$listfirme3 = ArrayHelper::map(SecteursActivites::find()->where(['secteur' => 'Renforcement institutionnel '])
		->asArray()->all(), 'idsecteurs_activites', 'nom');
$listfirme3["Autre"] = "Autre";

$data = array();
$pays = Pays::find()->select('nom_fr_fr')->all();
foreach ($pays as $p){
	$data[] = $p->nom_fr_fr;
}

/* $categorie = CategoriesData::find()->select('categories_idcategories')
		->where(['profil_entreprise_idprofil_entreprise' => $model->idprofil_entreprise])->asArray()->all();
$categorie_array = array();
foreach($categorie as $data){
	$categorie_array[] = $data['categories_idcategories'];
} */

$script = <<< JS
function showAutre(str) {
	if(str == 'AUTRE'){
		var divOne11 = document.getElementById('autre');
        divOne11.style.display='block';
	}else{
		var divOne11 = document.getElementById('autre');
        divOne11.style.display='none';
	}
}
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>

<div class="col-xs-3"> <!-- required for floating -->
     <ul class="nav nav-tabs tabs-left sideways">
		 <li class="active"><a href="#home-v" data-toggle="tab">Informations</a></li>
		 <li><a href="#profile-v" data-toggle="tab">Representant</a></li>
		 <li id="df"><a href="#messages-v" data-toggle="tab">Description Firme</a></li>
		 <li id="rs"><a href="#settings-v" data-toggle="tab">Ressources</a></li>
	</ul>
</div>

<?php $form = ActiveForm::begin([
		'enableAjaxValidation' => true
]); ?>
<div class="col-xs-9">
     <!-- Tab panes -->
	 <div class="tab-content">
		  <div class="tab-pane active" id="home-v">
				    <div class="row">
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'nom_firme')->textInput([
				    				'placeholder' => 'Nom de la firme'
				    		]) ?>
				    	</div>
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'capital_social')->widget(
				    			MaskedInput::className(), [
				    			'clientOptions' => [
				    				'alias' =>  'decimal',
				    				'groupSeparator' => '.',
				    				'autoGroup' => true
				    			],
				    		])->textInput(['placeholder' => 'capital social'])?>
				    	</div>
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'patente')->widget(MaskedInput::className(),
				    			['mask' => '[9-]AAA-999'])->textInput(['placeholder' => 'numero patente'])?>
				    	</div>
				    </div>
				    
				     <div class="row">
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'nationalite')->widget(
				    			Typeahead::classname(), [
							    'options' => ['placeholder' => 'Filter as you type ...'],
							    'pluginOptions' => ['highlight'=>true],
							    'dataset' => [
							        [
							            'local' => $data,
							            'limit' => 10
							        ]
							    ]
							]) ?>
				    	</div>
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'ref_moniteur')->textInput([
				    				'placeholder' => 'Ref Moniteur si societe anonyme'
				    		]) ?>
				    	</div>
				    	<div class="col-md-4">
				    		<?= $form->field($model, 'ref_journal')->textInput([
				    				'placeholder' => 'Ref Journal si national'
				    		]) ?>
				    	</div>
				    </div>
				    
					<div class="row">
				    	<div class="col-md-6">
				            <?= $form->field($model, 'nif')->widget(
				    			MaskedInput::className(), ['mask' => '999-999-999-9'
				    		])->textInput(['placeholder' => 'xxx-xxx-xxx-x']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'date_constitution')->widget(
				    			    DatePicker::classname(), [
				    				'options' => ['placeholder' => 'Enter birth date ...'],
				    				'pluginOptions' => [
				    					'autoclose'=>true,
				    					'format' => 'mm/dd/yyyy'
				    				]
				    		]) ?>
				    	</div>
				    </div>
				    
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'adresse')->textInput([
				    				'placeholder' => 'adresse'
				    		]) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'departement')->dropDownList($listdepart, 
				    			['id'=>'departement', 'prompt' => 'choisir un departement']) ?>
				    	</div>
				    </div>
				
				   <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'commune')->widget(
				    				DepDrop::className(), [
				    				/* 'type'=>DepDrop::TYPE_SELECT2, */
				    				'data'=>[$model->commune => $model->commune],
								    'options'=>['id'=>'commune', 'placeholder'=>'choisir commune...'],
				    				'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
								    'pluginOptions'=>[
								        'depends'=>['departement'],
								        'url'=>Url::to(['/profil-entreprise/commune'])
								    ]
								]) ?>
				    	</div>
				    	<div class="col-md-6">
				   			<?= $form->field($model, 'section_communale')->widget(
				   					DepDrop::className(), [
				   					'data'=>[$model->section_communale => $model->section_communale],
				   					'options'=>['placeholder'=>'choisir section communale...'],
				   					'pluginOptions'=>[
				   						'depends'=>['departement', 'commune'],
								        'url'=>Url::to(['/profil-entreprise/section'])
								    ]
				   			]) ?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'telephone')->widget(
				    			MaskedInput::className(), ['mask' => '999-9999-9999'
				    		])->textInput(['placeholder' => '(xxx)-xxxx-xxxx']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'email')->widget(MaskedInput::className(),[
				    			'clientOptions' => [
				    				'alias' =>  'email'
				    			],
				    		])->textInput(['placeholder' => 'janedoe@janedow.com'])?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'site_web')->widget(
				    			MaskedInput::className(), [
				    			'clientOptions' => [
				    				'alias' =>  'url',
				    			],
				    		])->textInput(['placeholder' => 'site web'])?>
				    	</div>
				    	
				    </div>
				    
				    <fieldset class="fieldset">
		  					<legend>Experience de la firme dans le domaine</legend>
		  					<div class="row">
						    	<div class="col-md-6">
						    		<?= $form->field($model, 'montant_eleve')->widget(
							    			MaskedInput::className(), [
							    			'clientOptions' => [
							    				'alias' =>  'decimal',
							    				'groupSeparator' => '.',
							    				'autoGroup' => true
							    			],
							    		])->textInput(['placeholder' => 'montant plus eleve'])?>
						    	</div>
						    	<div class="col-md-6">
						    		<?= $form->field($model, 'montant_faible')->widget(
							    			MaskedInput::className(), [
							    			'clientOptions' => [
							    				'alias' =>  'decimal',
							    				'groupSeparator' => '.',
							    				'autoGroup' => true
							    			],
							    		])->textInput(['placeholder' => 'montant plus faible'])?>
						    	</div>
						    </div>
		  					<div class="row">
						    	<div class="col-md-6">
						    		<?= $form->field($model, 'experience')
		  								   ->radioList(['Moins de 2 ans' => 'Moins de 2 ans', '2 ans et plus' => '2 ans et plus'], ['inline'=>true]) ?>
						    	</div>
						    </div> 
		  				</fieldset>
			    </div>
		  <div class="tab-pane" id="profile-v">
		  			<h5><em>Infos sur le mandataire de l'entreprise!</em></h5>
			    	<div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'prenom_mandataire')
				    			->textInput(['placeholder' => 'prenom']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'nom_mandataire')
				    			->textInput(['placeholder' => 'nom']) ?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'profession_mandataire')
				    			->textInput(['placeholder' => 'profession']) ?>
				    	</div>
				    	<div class="col-md-6">
				   			<?= $form->field($model, 'specialisation_mandataire')
				   				->textInput(['placeholder' => 'specialisation']) ?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'telephone_mandataire')->widget(
				    			MaskedInput::className(), ['mask' => '999-9999-9999'
				    		])->textInput(['placeholder' => '(xxx)-xxxx-xxxx']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'email_mandataire')->widget(
				    			MaskedInput::className(),[
				    			'clientOptions' => [
				    				'alias' =>  'email'
				    			],
				    		])->textInput(['placeholder' => 'johndoe@janedow.com'])?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'document_identite_valide')
				    			->dropDownList(['CIN' => 'CIN', 'NIF' => 'NIF', 
				    					'PASSPORT' => 'PASSPORT', 'LICENCE' => 'LICENCE',
				    					'AUTRE' => 'AUTRE'
				    		], 
				    			['prompt' => 'choisir un document', 'onchange' => 'showAutre(this.value)']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'numero_identite_valide')
				    			->textInput(['placeholder' => 'numero identite valide']) ?>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-6" id="autre" style="display: none;">
				    		 <?= $form->field($model, 'is_document_autre')
				    			->textInput(['placeholder' => 'autre document']) ?>
				    	</div>
				    	<div class="col-md-6">
				    		<?= $form->field($model, 'id_international')
				    			->textInput(['placeholder' => 'id international']) ?>
				    	</div>
				    </div> 	
			    </div>
		  <div class="tab-pane" id="messages-v" >
			    	<div class="row">
			    		<div class="col-md-12">
			    			<fieldset class="fieldset">
     			 				<legend>Type de firme</legend>
     			 				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($model, 'categorie')->widget(Select2::classname(), [
				    						 'data' => $listcategorie,
						    				 'language' => 'de',
						    				 'options' => ['multiple' => true, 'id'=> 'categorie-ik',
						    				 		'placeholder' => 'choisir categorie...'],
						    				 'pluginOptions' => [
						    					'allowClear' => true
						    				 ],
						    			]);?>
				    				</div>
				    				<div class="col-md-5" id="categorie" style="display:none;">
				    					<?= $form->field($model, 'autre_categorie')
		  							    	->textInput(['placeholder' => 'autre categorie']) ?>
				    				</div>
				    			</div>
     			 			</fieldset>
     			 			<hr/>
			    			<fieldset class="fieldset">
     			 				<legend>Secteur d&acute;activit&eacute;</legend>
     			 				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($model, 'firme_construction')->widget(Select2::classname(), [
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
				    					<?= $form->field($model, 'autre_firme_construction')
			  							    ->textInput(['placeholder' => 'autre firme construction']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($model, 'tech_info')->widget(Select2::classname(), [
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
				    					<?= $form->field($model, 'autre_tech_info')
			  							    ->textInput(['placeholder' => 'autre type tech']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($model, 'compt_finan_mana')->widget(Select2::classname(), [
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
				    					<?= $form->field($model, 'autre_compt_finan_mana')
			  							    ->textInput(['placeholder' => 'autre type']) ?>
				    				</div>
				    			</div>
			    				<br/>
			    				<div class="row">
				    				<div class="col-md-7">
				    					<?= $form->field($model, 'renforcement_inst')->widget(Select2::classname(), [
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
				    					<?= $form->field($model, 'autre_renforcement_inst')
			  							    ->textInput(['placeholder' => 'autre renforcement']) ?>
				    				</div>
				    			</div>
     			 			</fieldset>
			    			<hr/>
			    		</div>
			    	</div>
		  </div>
		  <div class="tab-pane" id="settings-v">
		  	   <div class="row">
		  			<div class="col-md-12">
		  				<fieldset class="fieldset">
		  					<legend>Ressources Humaines</legend>
		  					<h5><em>Personne 1</em></h5>
		  					<div class="row">
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'prenom_r')
		  								->textInput(['placeholder' => 'prenom']) ?>
		  						</div>
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'nom_r')
		  							    ->textInput(['placeholder' => 'nom']) ?>
		  						</div>
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'competences_r')
		  								->textInput(['placeholder' => 'competences']) ?>
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= $form->field($model, 'niveau_r')
		  								   ->radioList(['licence' => 'Licence', 'maitrise' => 'Maitrise', 
		  								   		'doctorat' => 'Doctorat', 'autre' => 'Autre'], ['inline'=>true]) ?>
		  						</div>
		  					</div>
		  					<hr/>
		  					<h5><em>Personne 2</em></h5>
		  					<div class="row">
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'prenom_r1')
		  								->textInput(['placeholder' => 'prenom']) ?>
		  						</div>
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'nom_r1')
		  								->textInput(['placeholder' => 'nom']) ?>
		  						</div>
		  						<div class="col-md-4">
		  							<?= $form->field($model, 'competences_r1')
		  								->textInput(['placeholder' => 'competences']) ?>
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= $form->field($model, 'niveau_r1')
		  								   ->radioList(['licence' => 'Licence', 'maitrise' => 'Maitrise', 
		  								   		'doctorat' => 'Doctorat', 'autre' => 'Autre'], ['inline'=>true]) ?>
		  						</div>
		  					</div>
		  					<hr/>
		  				</fieldset>
		  				
		  				<fieldset class="fieldset">
		  					<legend>Ressources Materielles</legend>
		  						<h5><em>Equipement 1</em></h5>
		  						<div class="row">
		  							<div class="col-md-6">
				  						<?= $form->field($model, 'equipement')->textInput() ?>
				  					</div>
				  					<div class="col-md-6">
				  						<?= $form->field($model, 'quantite')->widget(
							    			MaskedInput::className(), [
							    			'clientOptions' => [
							    				'alias' =>  'integer',
							    				'groupSeparator' => '.',
							    				'autoGroup' => true
							    			],
							    		])->textInput(['placeholder' => 'quantite'])?>
				  					</div>
		  						</div>
		  						<hr/>
		  						<h5><em>Equipement 2</em></h5>
		  						<div class="row">
		  							<div class="col-md-6">
				  						<?= $form->field($model, 'equipement1')->textInput() ?>
				  					</div>
				  					<div class="col-md-6">
				  						<?= $form->field($model, 'quantite1')->widget(
							    			MaskedInput::className(), [
							    			'clientOptions' => [
							    				'alias' =>  'integer',
							    				'groupSeparator' => '.',
							    				'autoGroup' => true
							    			],
							    		])->textInput(['placeholder' => 'quantite'])?>
				  					</div>
		  						</div>
		  						<hr/>
		  				</fieldset>
		  			</div>
		  	   </div>
		  </div>
	 </div>
</div>

<div class="row">
  <div class="col-md-offset-3">
  	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
  			['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>        	
    
    
    
