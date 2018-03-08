<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = Yii::t('app', 'Update').' '. $user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="user-update">

	<header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                    <h1 class="content-max-width">
                    	<?= Html::encode($this->title) ?>
                    	 <span class="pull-right">
                    	 	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      
                    	 </span>
                    </h1>
              </div>
        </div>
    </header>
    
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
       
</div>
