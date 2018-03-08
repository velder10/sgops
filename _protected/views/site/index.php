<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', Yii::$app->name);
?>

           <!-- Content Header (Page header) -->
           <header class="content-header container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="content-max-width">
                        	Bienvenue 
                        	<?php if (!Yii::$app->user->isGuest): ?>
                        		<?php echo strtoupper(Yii::$app->user->identity->username) ?>
                        	<?php endif; ?>
                        	sur SGOPS
                        </h1>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <div class="content container-fluid">
                <div class="row">
                	<div class="col-lg-12">
                		<div class="jumbotron">
                			<?php if (Yii::$app->user->isGuest): ?>
                        		<h1>Connectez-vous!</h1>
                        		<p class="lead">Start to work!!! </p>
					        	<p><?= Html::a('Se connecter', ['/site/login'], ['class' => 'btn btn-lg btn-primary']);?></p>
                        	<?php endif; ?>
                        	<?php if (!Yii::$app->user->isGuest): ?>
                        		<h1>F&eacute;licitations!</h1>
                        		<p class="lead">Vous vous &ecirc;tes connect&eacute;s avec succ&egrave;s sur SGOPS! 
					        		 Start to work!!! </p>
					        	<p><?= Html::a('Se Deconnecter', ['/site/logout'],['data-method' => 'post'],
					        			['class' => 'btn btn-lg btn-warning']);?></p>
                        	<?php endif; ?>
					    </div>
                	</div>
                </div>
            </div>