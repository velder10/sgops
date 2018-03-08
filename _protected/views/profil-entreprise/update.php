<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilEntreprise */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profil Entreprise',
]) . $model->idprofil_entreprise;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profil Entreprises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprofil_entreprise, 'url' => ['view', 'id' => $model->idprofil_entreprise]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');


$script = <<< JS
(function($) {
$(document).ready(function(){
	var id = $model->idprofil_entreprise;
	if(id > 0){
		document.getElementById('df').style.display='none';
		document.getElementById('rs').style.display='none';
		document.getElementById('messages-v').style.display='none';
		document.getElementById('settings-v').style.display='none';
	}
});
})(jQuery);
JS;
$this->registerJs($script, \yii\web\View::POS_END);

?>
<div class="profil-entreprise-update">

    <header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                    <h1 class="content-max-width">
                    	<?= Html::encode('Modifier '.$model->nom_firme) ?>
                    	 <span class="pull-right">
                    	 	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      
                    	 </span>
                    </h1>
              </div>
        </div>
    </header>
    
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
