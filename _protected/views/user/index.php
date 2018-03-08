<?php
use app\helpers\CssHelper;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->
           <header class="content-header container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="content-max-width">
                        	<?= Html::encode($this->title) ?>
                        	<span class="pull-right">
					            <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
					        </span>
                        </h1>
                    </div>
                </div>
            </header>
             
             <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-12">
                		<div class="box">
				            <div class="box-header with-border">
				              <h3 class="box-title">Liste des utilisateurs</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body table-responsive no-padding">
				            	<?= GridView::widget([
								        'dataProvider' => $dataProvider,
								        'filterModel' => $searchModel,
								        'summary' => false,
				            			'bordered' => false,
				            			'responsive' => true,
				            			'hover' => true,
								        'columns' => [
								            ['class' => 'yii\grid\SerialColumn'],
								            'username',
								            'email:email',
								            // status
								            [
								                'attribute'=>'status',
								                'filter' => $searchModel->statusList,
								                'value' => function ($data) {
								                    return $data->getStatusName($data->status);
								                },
								                'contentOptions'=>function($model, $key, $index, $column) {
								                    return ['class'=>CssHelper::userStatusCss($model->status)];
								                }
								            ],
								            // role
								            [
								                'attribute'=>'item_name',
								                'filter' => $searchModel->rolesList,
								                'value' => function ($data) {
								                    return $data->roleName;
								                },
								                'contentOptions'=>function($model, $key, $index, $column) {
								                    return ['class'=>CssHelper::roleCss($model->roleName)];
								                }
								            ],
								            // buttons
								            ['class' => 'yii\grid\ActionColumn',
								            'header' => "Menu",
								            'template' => '{view} {update} {delete}',
								                'buttons' => [
								                    'view' => function ($url, $model, $key) {
								                        return Html::a('', $url, ['title'=>'View user', 'class'=>'glyphicon glyphicon-eye-open']);
								                    },
								                    'update' => function ($url, $model, $key) {
								                        return Html::a('', $url, ['title'=>'Manage user', 'class'=>'glyphicon glyphicon-user']);
								                    },
								                    'delete' => function ($url, $model, $key) {
								                        return Html::a('', $url, 
								                        ['title'=>'Delete user', 
								                            'class'=>'glyphicon glyphicon-trash',
								                            'data' => [
								                                'confirm' => Yii::t('app', 'Are you sure you want to delete this user?'),
								                                'method' => 'post']
								                        ]);
								                    }
								                ]
								
								            ], // ActionColumn
								
								        ], // columns
								
								    ]); ?>
				            </div>
				        </div>
                	</div>
                </div>
            </div> 
               
