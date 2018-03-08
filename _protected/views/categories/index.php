<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriesSrch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->
           <header class="content-header container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="content-max-width">
                        	<?= Html::encode($this->title) ?>
                        	<span class="pull-right">
					            <?= Html::a(Yii::t('app', 'Create Categories'), ['create'], ['class' => 'btn btn-success']) ?>
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
				            <div class="box-header">
				              <h3 class="box-title">Liste des categories</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body no-padding">
				            	<?php Pjax::begin(); ?>    
					            	<?php echo GridView::widget([
								        'dataProvider' => $dataProvider,
								        'filterModel' => $searchModel,
					            		'summary' => false,
					            		'bordered' => false,
					            		'responsive' => true,
					            		'hover' => true,
								        'columns' => [
								            ['class' => 'yii\grid\SerialColumn'],
								            'nom',
								            'libelle',
								            'createdOn',
								            ['class' => 'yii\grid\ActionColumn'],
								        ],
								    ]); ?>
								<?php Pjax::end(); ?>
				            </div>
				        </div>
                	</div>
                </div>
            </div>
