<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = Yii::t('app', 'Add User');
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
                	<div class="col-lg-9">
                		<div class="box">
				            <!-- /.box-header -->
				            <div class="box-body">
				            	<?= $this->render('_form', ['user' => $user]) ?>
				            </div>
				        </div>
                	</div>
                </div>
            </div>

