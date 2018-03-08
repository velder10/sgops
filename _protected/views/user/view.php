<?php
use app\helpers\CssHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

	<header class="content-header container-fluid">
        <div class="row">
              <div class="col-lg-12">
                   <h1 class="content-max-width">
                       <?= Html::encode($this->title) ?>
                       <span class="pull-right">
					      <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
					      <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
					      <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
					          'data' => [
					               'confirm' => Yii::t('app', 'Are you sure you want to delete this user?'),
					               'method' => 'post',
					           ],
					      ]) ?>
					   </span>
                   </h1>
              </div>
        </div>
    </header>
    
	<!-- Main content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-9">
            	<?= DetailView::widget([
			        'model' => $model,
			        'attributes' => [
			            'id',
			            'username',
			            'email:email',
			            [
			                'attribute'=>'status',
			                'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
			                                '.$model->getStatusName($model->status).'
			                            </span>',
			                'format' => 'raw'
			            ],
			            [
			                'attribute'=>'item_name',
			                'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
			                                '.$model->getRoleName().'
			                            </span>',
			                'format' => 'raw'
			            ],
			            'created_at:date',
			            'updated_at:date',
			        ],
			    ]) ?>
            </div>
        </div>
    </div>
</div>
