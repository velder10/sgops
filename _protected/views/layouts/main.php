<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>" style="overflow-x:hidden;">
		<head>
			<meta charset="<?= Yii::$app->charset ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
			<title><?= Html::encode($this->title) ?></title>
			<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
			<?php $this->head() ?>
		</head>
		<body class="hold-transition skin-black-light sidebar-mini" style="overflow-x:hidden;">
			<?php $this->beginBody() ?>
				<div class="wrapper">
					<!-- Main Header -->
					<header class="main-header">
						<!-- Logo -->
						<a href="/" class="logo">
							<!-- mini logo for sidebar mini 50x50 pixels -->
							<span class="logo-mini"><b>SGOPS</b></span>
							<!-- logo for regular state and mobile devices -->
							<span class="logo-lg"><b>SGOPS</b></span>
						</a>

						<!-- Header Navbar -->
						<nav class="navbar navbar-static-top" role="navigation">
							<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
								<span class="sr-only">Toggle navigation</span>
							</a>
							<div class="btn-group">
								<a href="#" class="btn btn-primary navbar-btn dropdown-toggle" data-toggle="dropdown">
									1.0 <b class="caret"></b>
								</a>
							</div>
							<!-- Navbar Right Menu -->
							<div class="navbar-custom-menu">
								<ul class="nav navbar-nav">
									<li><a href="/">Home</a></li>
									<?php if (!Yii::$app->user->isGuest): ?>
										<li><?= Html::a('Se Deconnecter ('.Yii::$app->user->identity->username.')', ['/site/logout'],['data-method' => 'post']);?>
										</li>	
									<?php endif; ?>
									<?php if (Yii::$app->user->isGuest): ?>
				              			<li><?= Html::a('Se connecter', ['/site/login']);?></li>
									<?php endif; ?>
								</ul>
							</div>
						</nav>
					</header><!-- Left side column. contains the logo and sidebar -->
					
					<aside class="main-sidebar">
						<!-- sidebar: style can be found in sidebar.less -->
						<section class="sidebar">

							<!-- search form -->
							<form method="get" class="sidebar-form" id="sidebar-form">
								<div class="input-group">
									<input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
									<span class="input-group-btn">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat">
											<i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</form>
							<!-- /.search form -->

							<!-- Sidebar Menu -->
							<ul class="sidebar-menu" data-widget="tree">
								
								<li class="active"><?= Html::a('<i class="fa fa-home"></i> 
									<span>Home</span>', ['/site/index']);?></li>	
								
								<?php if (Yii::$app->user->can('admin')): ?>
									<li class="header">Administration</li>
									<li><?= Html::a('<i class="fa fa-users"></i> 
											<span>Users</span>', ['/user/index']);?></li>
									<li><?= Html::a('<i class="fa fa-user"></i> 
											<span>Inscrire un user</span>', ['/user/create']);?></li>		
									<li><?= Html::a('<i class="fa fa-th-list"></i> 
											<span>Auth Assignment</span>', ['']);?></li>	
									<li class="header">References</li>
									<li><?= Html::a('<i class="fa fa-arrows"></i> 
											<span>Liste Categories</span>', ['/categories/index']);?></li>
									<li><?= Html::a('<i class="fa fa-arrow-circle-o-right"></i> 
											<span>Liste Secteurs Activites</span>', ['/secteurs-activites/index']);?></li>
								<?php endif; ?>
								
								<?php if (Yii::$app->user->can('member')): ?>
									<li><?= Html::a('<i class="fa fa-line-chart"></i> 
											<span>Rapport</span>', ['/profil-entreprise/rapport']);?></li>
									<li class="header">Formulaires</li>
									<li><?= Html::a('<i class="fa fa-gears"></i> 
											<span>Entreprises</span>', ['/profil-entreprise/index']);?></li>
									
								<?php endif; ?>
								
							</ul>
							<!-- /.sidebar-menu -->
						</section>
						<!-- /.sidebar -->
					</aside>
					
					<!-- Content Wrapper. Contains page content -->
						<div class="content-wrapper">
							<article>
								<?= $content ?>
							</article>
						</div>
					<!-- /.content-wrapper -->
					
					<footer class="main-footer">
						<!-- To the right -->
						<div class="pull-right hidden-xs">
							Fonds d'Assistance &Eacute;conomique et Sociale (FAES)
						</div>
						<!-- Default to the left -->
						<strong>Copyright &copy; 2017 <a href="/"></a>.</strong> 
						Tous droits r&eacute;serv&eacute;s.
					</footer>
				</div>
			<?php $this->endBody() ?>
		</body>
	</html>
<?php $this->endPage() ?>
