<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriesData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-data-form">

    <?php $form = ActiveForm::begin(); ?>

    	<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($model, 'categories_idcategories')->textInput() ?>
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($model, 'libelle')->textInput() ?>
    		</div>
    	</div>
	   
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
