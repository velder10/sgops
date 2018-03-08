<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Se connecter');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->
           <header class="content-header container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="content-max-width">
                        	<?= Html::encode($this->title) ?>
                        </h1>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-12">
                		<div class="col-md-5 well bs-component">

					        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
					
					        <?php //-- use email or username field depending on model scenario --// ?>
					        <?php if ($model->scenario === 'lwe'): ?>
					
					            <?= $form->field($model, 'email')->input('email', 
					                ['placeholder' => Yii::t('app', 'Enter your e-mail'), 'autofocus' => true]) ?>
					
					        <?php else: ?>
					
					            <?= $form->field($model, 'username')->textInput(
					                ['placeholder' => Yii::t('app', 'Enter your username'), 'autofocus' => true]) ?>
					
					        <?php endif ?>
					
					        <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Enter your password')]) ?>
					
					        <?= $form->field($model, 'rememberMe')->checkbox() ?>
					
					        <div style="color:#999;margin:1em 0">
					            <?= Yii::t('app', 'If you forgot your password you can') ?>
					            <?= Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.
					        </div>
					
					        <div class="form-group">
					            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					        </div>
					
					        <?php ActiveForm::end(); ?>
					
					    </div>
                	</div>
                </div>
            </div>
            
