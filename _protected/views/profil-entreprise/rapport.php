<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use app\models\CategoriesData;
/* @var $this yii\web\View */
$this->title = 'Rapport';

$total = CategoriesData::find()->count();
?>                

<section class="content-header">
	<h1>
       Statistiques 
       <small></small>
    </h1>
    <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
       <li class="active">Entreprises</li>
    </ol>
</section>   

<section class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Services</span>
                  <span class="info-box-number">
                  	<?php
                       $services = CategoriesData::find()->where(['categories_idcategories' => 2])->count(); 
                       echo $services; 
                    ?>
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?php if($total !=0) echo round(100*$services/$total,2).'%' ?>"></div>
                  </div>
                  <span class="progress-description">
                    <?php if($total !=0) echo round(100*$services/$total,2).'%' ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
        <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-ship"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Commerciale et Industrielle</span>
                  <span class="info-box-number">
                  	<?php 
	                  	$ci = CategoriesData::find()->where(['categories_idcategories' => [1,3]])->count();
	                  	echo $ci;
                  	?>
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?php if($total !=0) echo round(100*$ci/$total,2).'%' ?>"></div>
                  </div>
                  <span class="progress-description">
                    <?php if($total !=0) echo round(100*$ci/$total,2).'%' ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
           <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-puzzle-piece"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Agent d'Execution</span>
                  <span class="info-box-number">
                  	<?php 
	                  	$ae = CategoriesData::find()->where(['categories_idcategories' => 1004])->count();
	                  	echo $ae;
                  	?>
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?php if($total !=0) echo round(100*$ae/$total,2).'%' ?>"></div>
                  </div>
                  <span class="progress-description">
                    <?php if($total !=0) echo round(100*$ae/$total,2).'%' ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Autres</span>
                  <span class="info-box-number">
                  <?php 
	                  	$autre = CategoriesData::find()->where(['categories_idcategories' => '3003'])->count();
	                  	echo $autre;
                  	?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?php if($total !=0) echo round(100*$autre/$total,2).'%' ?>"></div>
                  </div>
                  <span class="progress-description">
                    <?php if($total !=0) echo round(100*$autre/$total,2).'%' ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
</section>                                                                                                                                                                                                                                                                   