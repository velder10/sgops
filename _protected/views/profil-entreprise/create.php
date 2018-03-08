<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilEntreprise */

$this->title = Yii::t('app', "Ajouter un OPS");
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profil Entreprises'), 
		'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$script = <<< JS
(function($) {
$(document).ready(function(){

	$("#categorie-ik").on("change", function() {
		var string = $(this).val();
		console.log(string);
		if(string.indexOf("3005") >= 0){
			var divOne11 = document.getElementById('categorie');
        	divOne11.style.display='block';
			console.log('here');
		}else{
			var divOne11 = document.getElementById('categorie');
        	divOne11.style.display='none';
			console.log('here-no');
		}
    });

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

<!-- Content Header (Page header) -->
<header class="content-header container-fluid">
   <div class="row">
        <div class="col-lg-12">
             <h1 class="content-max-width"><?= Html::encode($this->title) ?></h1>
        </div>
   </div>
</header>
             
<!-- Main content -->
<div class="content container-fluid">
   <div class="row">
        <div class="col-sm-12">
        	<?= $this->render('_form', [
				 'model' => $model,
			]) ?>
        	<div class="clearfix"></div>
        </div>
   </div>
</div>

